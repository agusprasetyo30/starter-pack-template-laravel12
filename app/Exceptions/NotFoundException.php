<?php

namespace App\Exceptions;

use Exception;
use Response;

class NotFoundException extends Exception
{
    protected $code = 404;
    protected $message = "Resource Not Found";

    public function __construct($message = null) {
        if ($message) {
            $this->message = $message;
        }

        parent::__construct($this->message, $this->code);
    }

    public function render()
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
            'status_code' => $this->code,
            'errors' => [
                'resource' => [$this->getMessage()]
            ],
        ], $this->code);
    }
}
