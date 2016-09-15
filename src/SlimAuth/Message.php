<?php

namespace SlimAuth;


class Message
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $keysession;

    /**
     * @var array
     */
    private $attrsession;

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getKeysession(): string
    {
        return $this->keysession;
    }

    /**
     * @param string $keysession
     */
    public function setKeysession(string $keysession)
    {
        $this->keysession = $keysession;
    }

    /**
     * @return array
     */
    public function getAttrsession(): array
    {
        return $this->attrsession;
    }

    /**
     * @param array $attrsession
     */
    public function setAttrsession(array $attrsession)
    {
        $this->attrsession = $attrsession;
    }

}