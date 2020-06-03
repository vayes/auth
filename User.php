<?php

namespace Vayes\Auth;

class User
{
    /** @var string */
    protected $id;

    /** @var string */
    protected $first_name;

    /** @var string */
    protected $last_name;

    /** @var string */
    protected $full_name;

    /** @var string */
    protected $username;

    /** @var int */
    protected $gender = 0;

    /** @var string */
    protected $email;

    /** @var string */
    protected $password;

    /** @var int */
    protected $role;

    /** @var bool */
    protected $active = false;

    /** @var string */
    protected $verified_at;

    /** @var string|null */
    protected $remember_token;

    /** @var string */
    protected $created_at;

    /** @var int */
    protected $created_by;

    /** @var string */
    protected $updated_at;

    /** @var int */
    protected $updated_by;

    /** @var string */
    protected $deleted_at;

    /** @var int */
    protected $deleted_by;

    public function __construct($autoAssignUuid = false)
    {
        if (true === $autoAssignUuid) {
            $this->setId(uuid_create(UUID_VARIANT_DCE));
        }
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return $this
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;
        $this->full_name = $this->getFirstName() . ' ' . $this->getLastName();
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return $this
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;
        $this->full_name = $this->getFirstName() . ' ' . $this->getLastName();
        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    /**
     * @param string|null $full_name
     * @return $this
     */
    public function setFullName(?string $full_name): self
    {
        $this->full_name = $full_name;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     * @return $this
     */
    public function setGender(int $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param int $role
     * @return $this
     */
    public function setRole(int $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

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

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    /**
     * @param string|null $remember_token
     * @return $this
     */
    public function setRememberToken(?string $remember_token): self
    {
        $this->remember_token = $remember_token;
        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->created_by;
    }

    /**
     * @param string $created_by
     * @return $this
     */
    public function setCreatedBy(string $created_by): self
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updated_by;
    }

    /**
     * @param string $updated_by
     * @return $this
     */
    public function setUpdatedBy(string $updated_by): self
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    /**
     * @param string $deleted_at
     * @return $this
     */
    public function setDeletedAt(string $deleted_at): self
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function getDeletedBy(): ?string
    {
        return $this->deleted_by;
    }

    /**
     * @param string $deleted_by
     * @return $this
     */
    public function setDeletedBy(string $deleted_by): self
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }
}
