<?php

namespace Vayes\Auth;

use Vayes\Auth\Exception\AuthenticationException;
use Vayes\Auth\Exception\AuthenticationUserNotFoundException;

abstract class AbstractAuthenticator implements AuthenticatorInterface
{
    /** @var string */
    protected $authProviderKey;

    /** @var string */
    protected $logNS = '[AUTHENTICATOR]';

    /**
     * Does the authenticator support the given Request?
     *
     * If this returns false, the authenticator will be skipped.
     *
     * @return bool
     */
    abstract public function supports(): bool;

    /** Load translations that may be required for error or success messages */
    abstract protected function loadTranslations(): void;

    /**
     * Get the authentication credentials from the request and return them
     * as any type (e.g. an associate array).
     *
     * Whatever value you return here will be passed to getUser() and checkCredentials()
     *
     * For example, for a form login, you might:
     *
     *      return [
     *          'username' => $request->request->get('_username'),
     *          'password' => $request->request->get('_password'),
     *      ];
     *
     * Or for an API token that's on a header, you might use:
     *
     *      return ['api_key' => $request->headers->get('X-API-TOKEN')];
     *
     * @return mixed Any non-null value
     *
     * @throws \UnexpectedValueException If null is returned
     */
    abstract protected function getCredentials(): array;

    /**
     * Return a UserInterface object based on the credentials.
     *
     * The *credentials* are the return value from getCredentials()
     *
     * You may throw an AuthenticationException if you wish. If you return
     * null, then a UsernameNotFoundException is thrown for you.
     *
     * @param mixed $credentials
     *
     * @return UserInterface|null
     * @throws AuthenticationUserNotFoundException
     *
     */
    abstract protected function getUser(array $credentials): ?UserInterface;

    /**
     * Returns true if the credentials are valid.
     *
     * If any value other than true is returned, authentication will
     * fail. You may also throw an AuthenticationException if you wish
     * to cause authentication to fail.
     *
     * The *credentials* are the return value from getCredentials()
     *
     * @param mixed         $credentials
     * @param UserInterface $user
     *
     * @return bool
     *
     * @throws AuthenticationException
     */
    abstract protected function checkCredentials($credentials, UserInterface $user): bool;

    /**
     * Called when authentication executed, but failed (e.g. wrong username password).
     *
     * This should return the Response sent back to the user, like a
     * RedirectResponse to the login page or a 403 response.
     *
     * If you return null, the request will continue, but the user will
     * not be authenticated. This is probably not what you want to do.
     *
     * @param AuthenticationException $exception
     * @return mixed
     */
    abstract protected function onAuthenticationFailure(AuthenticationException $exception);

    /**
     * Called when authentication executed and was successful!
     *
     * This should return the Response sent back to the user, like a
     * RedirectResponse to the last page they visited.
     *
     * If you return null, the current request will continue, and the user
     * will be authenticated. This makes sense, for example, with an API.
     *
     * @param UserInterface $user
     * @param string|null   $providerKey
     * @return mixed
     */
    abstract protected function onAuthenticationSuccess(UserInterface $user, ?string $providerKey = null);

    /**
     * @return string
     * @throws AuthenticationException
     */
    protected function getAuthProvideKey(): string
    {
        if (null === $this->authProviderKey) {
            throw new AuthenticationException('You must set a provider key for ' . get_class($this));
        }

        return $this->authProviderKey;
    }

    public function start()
    {
        if ($this->supports()) {
            try {
                $this->getAuthProvideKey();
            } catch (AuthenticationException $e) {
                return $this->onAuthenticationFailure($e);
            }

            $this->loadTranslations();

            try {
                $credentials = $this->getCredentials();
            } catch (\InvalidArgumentException $e) {
                return $this->onAuthenticationFailure(
                    new AuthenticationException($e->getMessage())
                );
            }

            try {
                $user = $this->getUser($credentials);
            } catch (AuthenticationUserNotFoundException $e) {
                return $this->onAuthenticationFailure($e);
            }

            try {
                $isAuthenticated = $this->checkCredentials($credentials, $user);
            } catch (AuthenticationException $e) {
                return $this->onAuthenticationFailure($e);
            }

            if ($isAuthenticated) {
                return $this->onAuthenticationSuccess($user, $this->authProviderKey);
            } else {
                return $this->onAuthenticationFailure(
                    new AuthenticationException('Authenticated but an error occurred.')
                );
            }
        } else {
            return false;
        }
    }
}
