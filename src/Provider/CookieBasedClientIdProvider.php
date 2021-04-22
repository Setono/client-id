<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use Setono\ClientId\ClientId;
use Setono\ClientId\Cookie\CookieReaderInterface;

final class CookieBasedClientIdProvider implements ClientIdProviderInterface
{
    private ClientIdProviderInterface $decorated;

    private CookieReaderInterface $cookieReader;

    private string $cookieName;

    public function __construct(ClientIdProviderInterface $decorated, CookieReaderInterface $cookieReader, string $cookieName)
    {
        $this->decorated = $decorated;
        $this->cookieReader = $cookieReader;
        $this->cookieName = $cookieName;
    }

    public function getClientId(): ClientId
    {
        $value = $this->cookieReader->getValue($this->cookieName);

        return $value ? new ClientId($value) : $this->decorated->getClientId();
    }
}
