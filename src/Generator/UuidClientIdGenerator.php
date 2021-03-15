<?php

declare(strict_types=1);

namespace Setono\ClientId\Generator;

use Setono\ClientId\ClientId;
use Setono\ClientId\ClientIdGeneratorInterface;
use Symfony\Component\Uid\Uuid;

final class UuidClientIdGenerator implements ClientIdGeneratorInterface
{
    public function generate(): ClientId
    {
        return new ClientId((string) Uuid::v4());
    }
}
