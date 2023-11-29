<?php

namespace App\DataFixtures\Providers;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HashPasswordProvider
{

    private $userPasswordHasherInterface;
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public function hashPassword(string $plainPassword): string
    {
        return $this->userPasswordHasherInterface->hashPassword(new User(), $plainPassword);
    }

}