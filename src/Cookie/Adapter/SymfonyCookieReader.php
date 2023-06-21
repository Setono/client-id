<?php

declare(strict_types=1);

namespace Setono\ClientId\Cookie\Adapter;

use Setono\ClientId\Cookie\CookieReaderInterface;
use Symfony\Component\HttpFoundation\RequestStack;

final class SymfonyCookieReader implements CookieReaderInterface
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getValue(string $name): ?string
    {
        $request = $this->requestStack->getMainRequest();
        if (null === $request) {
            return null;
        }

        if (!$request->cookies->has($name)) {
            return null;
        }

        $cookie = $request->cookies->get($name);
        if (!is_string($cookie)) {
            return null;
        }

        return $cookie;
    }
}
