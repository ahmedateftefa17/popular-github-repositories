<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RepositoriesExport;
use App\Mail\RepositoriesExported;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;

class RepositoriesController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();

        if ($request->input('date')) {
            $q = "created:>{$request->input('date')} ";
        } else {
            $q = "created:>2019-01-10 ";
        }
        if ($request->input('language')) {
            $q .= "language:{$request->input('language')} ";
        }

        $limit = $request->input('limit') ?? 10;

        $response = $client->get("https://api.github.com/search/repositories?q={$q}&sort=stars&order=desc&per_page={$limit}");

        $repositories = json_decode($response->getBody()->getContents())->items;

        if ($request->input('action') == 'export') {
            return Excel::download(new RepositoriesExport($repositories), 'repositories.xlsx');
        }

        if ($request->input('action') == 'mail-export') {
            Mail::to(new Address('admin@example.com', 'Admin'))
                ->send(new RepositoriesExported($repositories));

            $request->session()->flash('message', 'Exported repositories sent to your email (admin@example.com)');

            return redirect()->back();
        }

        return view('repositories.index', compact('repositories'));
    }
}
