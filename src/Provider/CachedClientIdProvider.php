<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use Setono\ClientId\ClientId;
use Setono\ClientId\ClientIdProviderInterface;

final class CachedClientIdProvider implements ClientIdProviderInterface
{
    private ?ClientId $clientId = null;

    private ClientIdProviderInterface $decorated;

    public function __construct(ClientIdProviderInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function get(): ClientId
    {
        if (null === $this->clientId) {
            $this->clientId = $this->decorated->get();
        }

        return $this->clientId;
    }
}
