<?php

namespace Vayes\Auth\Exception;

use Throwable;

class AuthUserInvalidPasswordException extends AuthenticationException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = trans('ERR_AUTH_USER_INVALID_PASSWORD');
        }
        parent::__construct($message, $code, $previous);
    }
}
