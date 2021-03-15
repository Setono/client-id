<?php

declare(strict_types=1);

namespace Setono\ClientId;

final class CachedClientId implements ClientIdInterface
{
    private ?string $clientId = null;

    private ClientIdInterface $decorated;

    public function __construct(ClientIdInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function get(): string
    {
        if (null === $this->clientId) {
            $this->clientId = $this->decorated->get();
        }

        return $this->clientId;
    }
}
