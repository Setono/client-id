<?php

declare(strict_types=1);

namespace Setono\ClientId;

use Setono\ClientId\Cookie\CookieReaderInterface;

final class CookieBasedClientId implements ClientIdInterface
{
    private ClientIdInterface $decorated;

    private CookieReaderInterface $cookieReader;

    private string $cookieName;

    public function __construct(ClientIdInterface $decorated, CookieReaderInterface $cookieReader, string $cookieName)
    {
        $this->decorated = $decorated;
        $this->cookieReader = $cookieReader;
        $this->cookieName = $cookieName;
    }

    public function get(): string
    {
        $value = $this->cookieReader->getValue($this->cookieName);

        return $value ?? $this->decorated->get();
    }
}
