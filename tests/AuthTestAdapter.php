<?php
/**
 * Created by PhpStorm.
 * User: dilsonrabelo
 * Date: 02/09/16
 * Time: 15:42
 */

namespace Tests;

use SlimAuth\AuthResponse;
use SlimAuth\AuthAdapterInterface;

class AuthTestAdapter implements AuthAdapterInterface
{

    private $username;

    private $password;

    /**
     * AuthTestAdapter constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function authenticate() : AuthResponse
    {
        if ($this->username == 'username' && $this->password == 'password') {
            return new AuthResponse(AuthResponse::AUTHRESPONSE_SUCCESS, 'User auth success', 'Slim3Auth', [ 'id' => 1010 ]);
        }

        return new AuthResponse(AuthResponse::AUTHRESPONSE_FAILURE, 'Failure');
    }

}