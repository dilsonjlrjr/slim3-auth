<?php

namespace SlimAuth;

/**
 * Interface AuthAdapterInterface
 * Data entry must be defined in the class constructor to redefine methods
 * @package SlimAuth
 */
interface AuthAdapterInterface
{
    /**
     * Authenticate method
     * @return AuthResponse
     */
    function authenticate() : AuthResponse;
}