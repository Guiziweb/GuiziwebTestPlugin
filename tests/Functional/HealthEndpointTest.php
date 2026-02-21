<?php

declare(strict_types=1);

namespace Tests\Guiziweb\SyliusTestPlugin\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HealthEndpointTest extends WebTestCase
{
    public function testHealthEndpointReturnsOk(): void
    {
        $client = self::createClient();

        $client->request('GET', '/api/health');

        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        $data = json_decode($response->getContent(), true);
        $this->assertSame(['status' => 'ok'], $data);
    }
}
