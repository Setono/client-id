<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use PHPUnit\Framework\TestCase;
use Setono\ClientId\ClientId;
use Setono\ClientId\Generator\ClientIdGeneratorInterface;

/**
 * @covers \Setono\ClientId\Provider\GeneratedClientIdProvider
 */
final class GeneratedClientIdProviderTest extends TestCase
{
    /**
     * @test
     */
    public function it_uses_generator(): void
    {
        $generator = new class() implements ClientIdGeneratorInterface {
            public function generate(): ClientId
            {
                return new ClientId('client_id');
            }
        };

        $clientId = new GeneratedClientIdProvider($generator);
        self::assertSame('client_id', $clientId->get()->toString());
    }
}
