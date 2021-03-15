<?php

declare(strict_types=1);

namespace Setono\ClientId\Cookie\Adapter;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @covers \Setono\ClientId\Cookie\Adapter\SymfonyCookieReader
 */
final class SymfonyCookieReaderTest extends TestCase
{
    /**
     * @test
     */
    public function it_reads_cookie_value(): void
    {
        $request = new Request([], [], [], ['cookie_name' => 'cookie_value']);

        $requestStack = new RequestStack();
        $requestStack->push($request);

        $reader = new SymfonyCookieReader($requestStack);

        self::assertSame('cookie_value', $reader->getValue('cookie_name'));
    }

    /**
     * @test
     */
    public function it_returns_null_if_no_master_request_is_present(): void
    {
        $requestStack = new RequestStack();

        $reader = new SymfonyCookieReader($requestStack);

        self::assertNull($reader->getValue('cookie_name'));
    }

    /**
     * @test
     */
    public function it_returns_null_if_cookie_is_not_present(): void
    {
        $request = new Request([], [], [], ['other_cookie_name' => 'cookie_value']);

        $requestStack = new RequestStack();
        $requestStack->push($request);

        $reader = new SymfonyCookieReader($requestStack);

        self::assertNull($reader->getValue('cookie_name'));
    }

    /**
     * @test
     */
    public function it_returns_null_if_cookie_is_not_expected_value(): void
    {
        $request = new Request([], [], [], ['cookie_name' => ['key' => 'val']]);

        $requestStack = new RequestStack();
        $requestStack->push($request);

        $reader = new SymfonyCookieReader($requestStack);

        self::assertNull($reader->getValue('cookie_name'));
    }
}
