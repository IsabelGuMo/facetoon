<?php

namespace App\Security;

class Encryptor
{
    public function encrypt(string $text): string
    {
        return sha1($text);
    }
}