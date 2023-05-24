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

function getAdminMails(): array
{
    $adminMails = explode(',', config('mail.admin_mails'));
    return array_filter($adminMails, function ($mail) {
        return Str::contains($mail, '@');
    });
}

