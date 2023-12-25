<?php

function dd($value) // 'display dump'
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}