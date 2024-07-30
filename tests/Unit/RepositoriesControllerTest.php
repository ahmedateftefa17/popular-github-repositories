<?php

namespace Tests\Unit;

use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class RepositoriesControllerTest extends TestCase
{
    public function testIndexReturnsView()
    {
        $clientMock = $this->createMock(Client::class);
        $clientMock->method('get')->willReturn(new Response(200, [], json_encode(['items' => []])));

        $this->app->instance(Client::class, $clientMock);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('repositories.index');
    }
}
