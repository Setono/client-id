<?php

declare(strict_types=1);

namespace Setono\ClientId\Generator;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

/**
 * @covers \Setono\ClientId\Generator\UuidClientIdGenerator
 */
final class UuidClientIdGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_generates(): void
    {
        $generator = new UuidClientIdGenerator();
        self::assertIsString($generator->generate());
    }

    /**
     * @test
     */
    public function it_generates_a_new_each_time(): void
    {
        $generator = new UuidClientIdGenerator();

        $id1 = $generator->generate();
        $id2 = $generator->generate();

        self::assertNotSame($id1, $id2);
    }

    /**
     * @test
     */
    public function it_generates_a_uuid_v4(): void
    {
        $generator = new UuidClientIdGenerator();

        $uuid = Uuid::fromString($generator->generate());

        self::assertInstanceOf(UuidV4::class, $uuid);
    }
}
