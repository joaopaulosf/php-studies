<?php

function dd($value) // 'display dump'
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorized($condition): void
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}