<?php

declare(strict_types=1);

namespace Setono\ClientId;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\ClientId\CachedClientId
 */
final class CachedClientIdTest extends TestCase
{
    /**
     * @test
     */
    public function it_caches_result(): void
    {
        $clientId = new CachedClientId(new class() implements ClientIdInterface {
            public function get(): string
            {
                return random_bytes(10);
            }
        });

        $result1 = $clientId->get();
        $result2 = $clientId->get();

        self::assertSame($result1, $result2);
    }
}
