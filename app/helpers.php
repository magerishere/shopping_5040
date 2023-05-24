<?php

use Illuminate\Support\Str;

function getLastStr(string $subject)
{
    return Str::substr($subject, -1, 1);
}

function replaceLastStr(string $search, string $replace, string $subject)
{
    return Str::replaceLast($search, $replace, $subject);
}
