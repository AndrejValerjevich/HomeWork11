<?php

class EmptyProductException extends Exception
{
    protected $message;

    public function __construct($message)
    {
        parent::__construct($message);
    }
}