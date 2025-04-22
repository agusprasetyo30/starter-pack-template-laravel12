<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;

class ValidationException extends Exception
{
    protected $validator;
    protected $code = 422;

    public function __construct($validator, $message = "Validation failed")
    {
        parent::__construct($message);
        $this->validator = $validator;
    }

    public function render()
    {
        // set response from macro response configuration
        return Response::unproccessableContent($this->validator->errors(), $this->getMessage(), $this->code);
    }

    public function getValidator()
    {
        return $this->validator;
    }
}
