<?php

namespace Vayes\Auth;

class UserProvider implements UserProviderInterface
{
    /** @var string|null */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $username;

    /** @var string */
    private $email;

    /** @var int */
    private $role;

    /** @var bool */
    private $active;

    /** @var string */
    private $verified_at;

    /** @var string */
    private $created_at;

    /** @var string */
    private $updated_at;

    /** @var array|null */
    private $permissions;

    /** @var bool|null */
    private $fully_authenticated = false;

    public function __construct(User $user, $fullyAuthenticated = false)
    {
        $this
            ->setId($user->getId())
            ->setFirstName($user->getFirstName())
            ->setLastName($user->getLastName())
            ->setUsername($user->getUsername())
            ->setEmail($user->getEmail())
            ->setRole($user->getRole())
            ->setActive($user->isActive())
            ->setVerifiedAt($user->getVerifiedAt())
            ->setCreatedAt($user->getCreatedAt())
            ->setUpdatedAt($user->getUpdatedAt())
            ->setFullyAuthenticated($fullyAuthenticated)
         ;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return $this
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return $this
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role;
    }

    /**
     * @param int|null $role
     * @return $this
     */
    public function setRole(?int $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param bool|null $active
     * @return $this
     */
    public function setActive(?bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getVerifiedAt(): ?string
    {
        return $this->verified_at;
    }

    /**
     * @param string|null $verified_at
     * @return $this
     */
    public function setVerifiedAt(?string $verified_at): self
    {
        $this->verified_at = $verified_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param string|null $created_at
     * @return $this
     */
    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @param string|null $updated_at
     * @return $this
     */
    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * @param array|null $permissions
     * @return $this
     */
    public function setPermissions(?array $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isFullyAuthenticated(): ?bool
    {
        return $this->fully_authenticated;
    }

    /**
     * @param bool|null $fully_authenticated
     * @return $this
     */
    public function setFullyAuthenticated(?bool $fully_authenticated): self
    {
        $this->fully_authenticated = $fully_authenticated;
        return $this;
    }
}
