<?php

namespace Larapie\Guard\Exceptions;

use Exception;

class ResolveFailedException extends Exception
{
    protected $message = 'Could not resolve the string to an exception. It requires additional arguments. Try to pass it as an object';
}
