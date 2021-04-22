<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use Setono\ClientId\ClientId;

final class CachedClientIdProvider implements ClientIdProviderInterface
{
    private ?ClientId $clientId = null;

    private ClientIdProviderInterface $decorated;

    public function __construct(ClientIdProviderInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function getClientId(): ClientId
    {
        if (null === $this->clientId) {
            $this->clientId = $this->decorated->getClientId();
        }

        return $this->clientId;
    }
}
