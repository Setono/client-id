<?php

declare(strict_types=1);

namespace Setono\ClientId;

final class GeneratedClientId implements ClientIdInterface
{
    private ClientIdGeneratorInterface $clientIdGenerator;

    public function __construct(ClientIdGeneratorInterface $clientIdGenerator)
    {
        $this->clientIdGenerator = $clientIdGenerator;
    }

    public function get(): string
    {
        return $this->clientIdGenerator->generate();
    }
}
