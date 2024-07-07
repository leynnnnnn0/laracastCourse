<?php

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        if(!$key)
        {
            return;
        }

        $middleware = static::MAP[$key];

        if(!$middleware)
        {
            throw new Exception("Invalid key for middleware");
        }
        (new $middleware)->handle();
    }

}