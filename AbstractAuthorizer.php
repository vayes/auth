<?php

namespace Vayes\Auth;

abstract class AbstractAuthorizer implements AuthorizerInterface
{
    /** @var array */
    protected $permissions;

    /** @var array */
    protected $userPermissions;

    abstract public function isAuthenticated(): bool;

    abstract public function isGranted(string $permissionNam): bool;

    abstract protected function loadPermissions(): array;

    abstract protected function loadUserPermissions(): bool;

    abstract public function addPermission(string $permissionName, ?UserInterface $user = null): bool;

    abstract public function removePermission(string $permissionName, ?UserInterface $user = null): bool;

    /**
     * @param $permissionName
     * @return int|null
     */
    protected function getPermissionIdByName($permissionName): ?int
    {
        return isset($this->permissions[$permissionName])
            ? $this->permissions[$permissionName]
            : null;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return $this
     */
    public function setPermissions(array $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return array
     */
    public function getUserPermissions(): array
    {
        return $this->userPermissions;
    }

    /**
     * @param array $userPermissions
     * @return $this
     */
    public function setUserPermissions(array $userPermissions): self
    {
        $this->userPermissions = $userPermissions;
        return $this;
    }
}
