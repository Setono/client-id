<?php

declare(strict_types=1);

namespace Setono\ClientId\Generator;

use Setono\ClientId\ClientIdGeneratorInterface;
use Symfony\Component\Uid\Uuid;

final class UuidClientIdGenerator implements ClientIdGeneratorInterface
{
    public function generate(): string
    {
        return (string) Uuid::v4();
    }
}
