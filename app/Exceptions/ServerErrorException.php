<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Response;
use Log;

class ServerErrorException extends Exception
{
    protected $code = 500;
    protected $message = "Internal Server Error";
    protected $errorDetails;

    public function __construct(?string $message = null, ?array $errorDetails = null)
    {
        if ($message) {
            $this->message = $message;
        }

        $this->errorDetails = $errorDetails;

        parent::__construct($this->message, $this->code);
    }

    public function render()
    {
        // set response from macro response configuration
        return Response::internalServerError($this, $this->getMessage(), $this->code);
    }

    public function report()
    {
        Log::error($this->getMessage(), [
            'exception' => $this,
            'url' => request()?->fullUrl(),
            'input' => request()?->all()
        ]);
    }
}
