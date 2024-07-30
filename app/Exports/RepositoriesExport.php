<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RepositoriesExport implements FromCollection, WithHeadings
{
    protected $repositories;

    public function __construct($repositories)
    {
        $this->repositories = $repositories;
    }

    public function collection()
    {
        return collect($this->repositories)->map(function ($repo) {
            return [
                'name' => $repo->name,
                'stars' => $repo->stargazers_count,
                'language' => $repo->language,
                'url' => $repo->html_url,
            ];
        });
    }

    public function headings(): array
    {
        return ['Repository Name', 'Stars', 'Language', 'URL'];
    }
}
