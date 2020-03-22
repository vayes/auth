<?php

namespace Vayes\Auth;

abstract class AbstractAuthGateway
{
    abstract protected function createUser(UserInterface $user): bool;

    abstract protected function encodePassword(string $password): string;

    abstract public function verifyPassword(string $rawPassword, string $hashedPassword): bool;

    abstract protected function fetchUser(int $id): UserInterface;
}
