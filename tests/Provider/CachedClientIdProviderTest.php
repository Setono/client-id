<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use PHPUnit\Framework\TestCase;
use Setono\ClientId\ClientId;

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
            public function getClientId(): ClientId
            {
                return new ClientId(random_bytes(10));
            }
        });

        $result1 = $clientId->getClientId();
        $result2 = $clientId->getClientId();

        self::assertSame($result1, $result2);
    }
}
