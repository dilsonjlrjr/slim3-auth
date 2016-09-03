<?php
/**
 * Created by PhpStorm.
 * User: dilsonrabelo
 * Date: 02/09/16
 * Time: 14:37
 */

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
     * @var array
     */
    private $messages;


    /**
     * AuthResponse constructor.
     * @param int $code
     * @param string $message
     * @param string $keyAttributeSession
     * @param array $attributesSession
     */
    public function __construct(int $code = 0, string $message = '', string $keyAttributeSession = 'Slim3Auth', array $attributesSession = [])
    {
        $this->setMessage($code, $message, $keyAttributeSession, $attributesSession);
    }

    /**
     * @return array
     */
    public function getMessages() {
        return $this->messages;
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
        $this->messages = [
            self::AUTHRESPONSE_ATTRCODE => $code,
            self::AUTHRESPONSE_ATTRMESSAGE => $message,
            self::AUTHRESPONSE_ATTRKEYSESSION => $keyAttributeSession,
            self::AUTHRESPONSE_ATTRSESSION => $attributesSession
        ];
    }

}