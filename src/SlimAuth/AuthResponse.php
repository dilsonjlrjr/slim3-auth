<?php

namespace SlimAuth;

/**
 * Class AuthResponse
 * @package SlimAuth
 */
class AuthResponse
{

    const AUTHRESPONSE_SUCCESS = 0;
    const AUTHRESPONSE_FAILURE = 1;

    const AUTHRESPONSE_ATTRCODE = 'code';
    const AUTHRESPONSE_ATTRMESSAGE = 'message';
    const AUTHRESPONSE_ATTRKEYSESSION = 'key_attributes_session';
    const AUTHRESPONSE_ATTRSESSION = 'attributes_session';

    /**
     * @var Message
     */
    private $message;


    /**
     * AuthResponse constructor.
     * @param int $code
     * @param string $message
     * @param string $keyAttributeSession
     * @param array $attributesSession
     */
    public function __construct(int $code = 0, string $message = '', string $keyAttributeSession = 'Slim3Auth', array $attributesSession = [])
    {
        $this->message = new Message();
        $this->setMessage($code, $message, $keyAttributeSession, $attributesSession);
    }

    /**
     * @return Message
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set message Auth Response
     *
     * @param int $code AUTHRESPONSE_SUCCESS, AUTHRESPONSE_FAILURE
     * @param string $message
     * @param string $keyAttributeSession
     * @param array $attributesSession
     */
    public function setMessage(int $code, string $message, string $keyAttributeSession = 'Slim3Auth', array $attributesSession = []) {
        $this->message->setCode($code);
        $this->message->setMessage($message);
        $this->message->setKeysession($keyAttributeSession);
        $this->message->setAttrsession($attributesSession);
    }

}