<?php

declare(strict_types=1);

namespace Setono\ClientId;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\ClientId\GeneratedClientId
 */
final class GeneratedClientIdTest extends TestCase
{
    /**
     * @test
     */
    public function it_uses_generator(): void
    {
        $generator = new class() implements ClientIdGeneratorInterface {
            public function generate(): string
            {
                return 'client_id';
            }
        };

        $clientId = new GeneratedClientId($generator);
        self::assertSame('client_id', $clientId->get());
    }
}
