<?php

namespace Vayes\Auth;

interface AuthorizerInterface
{
    public function isAuthenticated(): bool;

    public function isGranted(string $permissionName): bool;

    public function addPermission(string $permissionName, ?UserInterface $user = null): bool;

    public function removePermission(string $permissionName, ?UserInterface $user = null): bool;
}
