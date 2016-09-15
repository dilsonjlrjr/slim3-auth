<?php

namespace SlimAuth;


use RKA\Session;

class SlimAuthFacade
{
    /**
     * @var AuthAdapterInterface
     */
    private $authAdapterInterface;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var AuthResponse
     */
    private $authResponse;

    /**
     * SlimAuthFacade constructor.
     *
     * @param AuthAdapterInterface $authAdapter
     * @param Session $session
     */
    public function __construct(AuthAdapterInterface $authAdapter, Session $session)
    {
        $this->authAdapterInterface = $authAdapter;
        $this->session = $session;
    }

    /**
     * Auth method
     * @throws \Exception
     */
    public function auth() {

        try {
            $this->authResponse = $this->authAdapterInterface->authenticate();
        } catch (\Exception $ex) {
            throw $ex;
        }

        $message = $this->authResponse->getMessage();

        if ($message->getCode() == AuthResponse::AUTHRESPONSE_SUCCESS) {
            $this->session->set($message->getKeysession(), $message->getAttrsession());
        }

        return;
    }

    public function isValid() {
        $message = $this->authResponse->getMessage();
        return ($message->getCode() == AuthResponse::AUTHRESPONSE_SUCCESS);
    }

    public function getAuthResponse() {
        return $this->authResponse;
    }

}