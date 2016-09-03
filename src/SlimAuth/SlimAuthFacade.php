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
     *
     * @return bool
     * @throws \Exception
     */
    public function auth() {

        try {
            $this->authResponse = $this->authAdapterInterface->authenticate();
        } catch (\Exception $ex) {
            throw $ex;
        }

        $messages = $this->authResponse->getMessages();

        if ($messages[AuthResponse::AUTHRESPONSE_ATTRCODE] == AuthResponse::AUTHRESPONSE_SUCCESS) {
            $this->session->set($messages[AuthResponse::AUTHRESPONSE_ATTRKEYSESSION], $messages[AuthResponse::AUTHRESPONSE_ATTRSESSION]);
        }

        return true;
    }

    public function isValid() {
        $messages = $this->authResponse->getMessages();
        return ($messages[AuthResponse::AUTHRESPONSE_ATTRCODE] == AuthResponse::AUTHRESPONSE_SUCCESS);
    }

    public function getAuthResponse() {
        return $this->authResponse;
    }

}