<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use PHPUnit\Framework\TestCase;
use Setono\ClientId\ClientId;
use Setono\ClientId\Cookie\CookieReaderInterface;

/**
 * @covers \Setono\ClientId\Provider\CookieBasedClientIdProvider
 */
final class CookieBasedClientIdProviderTest extends TestCase
{
    /**
     * @test
     */
    public function it_reads_client_id_from_cookie(): void
    {
        $cookieReader = new class() implements CookieReaderInterface {
            public function getValue(string $name): ?string
            {
                return 'cookie_value';
            }
        };

        $clientIdProvider = new CookieBasedClientIdProvider(self::getDecorated(), $cookieReader, 'cookie_name');

        self::assertSame('cookie_value', $clientIdProvider->get()->value());
    }

    private static function getDecorated(): ClientIdProviderInterface
    {
        return new class() implements ClientIdProviderInterface {
            public function get(): ClientId
            {
                return new ClientId('client_id');
            }
        };
    }
}
