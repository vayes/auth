<?php

namespace Vayes\Auth;

interface AuthenticatorInterface
{
    public function supports(): bool;

    /** Starts sequence of authenticator */
    public function start();
}
