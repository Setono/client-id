<?php

declare(strict_types=1);

namespace Setono\ClientId\Provider;

use Setono\ClientId\ClientId;
use Setono\ClientId\Generator\ClientIdGeneratorInterface;

final class GeneratedClientIdProvider implements ClientIdProviderInterface
{
    private ClientIdGeneratorInterface $clientIdGenerator;

    public function __construct(ClientIdGeneratorInterface $clientIdGenerator)
    {
        $this->clientIdGenerator = $clientIdGenerator;
    }

    public function getClientId(): ClientId
    {
        return $this->clientIdGenerator->generate();
    }
}
