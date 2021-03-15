<?php

declare(strict_types=1);

namespace Setono\ClientId;

use PHPUnit\Framework\TestCase;
use Setono\ClientId\Cookie\CookieReaderInterface;

/**
 * @covers \Setono\ClientId\CookieBasedClientId
 */
final class CookieBasedClientIdTest extends TestCase
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

        $clientId = new CookieBasedClientId(self::getDecorated(), $cookieReader, 'cookie_name');

        self::assertSame('cookie_value', $clientId->get());
    }

    private static function getDecorated(): ClientIdInterface
    {
        return new class() implements ClientIdInterface {
            public function get(): string
            {
                return 'client_id';
            }
        };
    }
}
