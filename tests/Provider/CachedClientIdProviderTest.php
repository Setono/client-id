<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use PHPUnit\Framework\TestCase;
use Setono\ClientId\ClientId;
use Setono\ClientId\ClientIdProviderInterface;

/**
 * @covers \Setono\ClientId\Provider\CachedClientIdProvider
 */
final class CachedClientIdProviderTest extends TestCase
{
    /**
     * @test
     */
    public function it_caches_result(): void
    {
        $clientId = new CachedClientIdProvider(new class() implements ClientIdProviderInterface {
            public function get(): ClientId
            {
                return new ClientId(random_bytes(10));
            }
        });

        $result1 = $clientId->get();
        $result2 = $clientId->get();

        self::assertSame($result1, $result2);
    }
}
