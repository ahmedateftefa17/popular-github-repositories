<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Exports\RepositoriesExport;
use Maatwebsite\Excel\Concerns\FromCollection;

class RepositoriesExportTest extends TestCase
{
    public function testExportImplementsFromCollection()
    {
        $repositories = [
            (object)['name' => 'repo1', 'stargazers_count' => 10, 'language' => 'PHP', 'html_url' => 'http://example.com/repo1'],
            (object)['name' => 'repo2', 'stargazers_count' => 20, 'language' => 'JavaScript', 'html_url' => 'http://example.com/repo2'],
        ];

        $export = new RepositoriesExport($repositories);
        $this->assertInstanceOf(FromCollection::class, $export);
    }
}
