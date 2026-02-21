<?php

declare(strict_types=1);

namespace Tests\Guiziweb\SyliusTestPlugin\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HealthEndpointTest extends WebTestCase
{
    public function testHealthEndpointReturnsSuccessfully(): void
    {
        $client = self::createClient();

        $client->request('GET', '/api/health');

        self::assertResponseIsSuccessful();
    }

    public function testHealthEndpointReturnsJson(): void
    {
        $client = self::createClient();

        $client->request('GET', '/api/health');

        self::assertResponseHeaderSame('Content-Type', 'application/json');
    }

    public function testHealthEndpointReturnsStatusOk(): void
    {
        $client = self::createClient();

        $client->request('GET', '/api/health');

        $data = json_decode($client->getResponse()->getContent(), true);
        $this->assertSame(['status' => 'ok'], $data);
    }
}