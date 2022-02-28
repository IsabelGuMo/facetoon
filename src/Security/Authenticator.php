<?php

namespace App\Security;

use App\Entity\Member;
use App\Repository\MemberRepository;

class Authenticator
{
    private Encryptor $encryptor;
    private MemberRepository $memberRepository;

    public function __construct(Encryptor $encryptor, MemberRepository $memberRepository)
    {
        $this->encryptor = $encryptor;
        $this->memberRepository = $memberRepository;
    }

    public function authenticate(string $email, string $password): ?Member
    {
        $member = $this->memberRepository->findByEmail($email);

        if (is_null($member)) {
            return null;
        }

        if ($member->getPassword() !== $this->encryptor->encrypt($password)) {
            return null;
        }

        return $member;
    }
}