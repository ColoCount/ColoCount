<?php
namespace App\Base;
class CookieHelper
{
    public static function setCookie(string $token): void
    {
        setcookie('token', $token, time() + (120), '/', 'localhost', false, false);
    }
}