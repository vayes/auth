<?php

namespace Vayes\Auth;

interface UserProviderInterface
{
    /**
     * @return bool|null
     */
    public function isFullyAuthenticated(): ?bool;

    /**
     * @param bool|null $fully_authenticated
     * @return $this
     */
    public function setFullyAuthenticated(?bool $fully_authenticated);
}
