<?php

declare(strict_types=1);

namespace Setono\ClientId\Cookie;

interface CookieReaderInterface
{
    /**
     * Returns the cookie value for the given cookie name.
     * If the cookie does not exist it returns null
     */
    public function getValue(string $name): ?string;
}
