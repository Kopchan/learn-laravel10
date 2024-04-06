<?php

namespace App\Exceptions;

use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends HttpResponseException
{
    public function __construct(int $code, string $message, array $errors = null)
    {
        $response['message'] = $message;
        if ($errors)
            $response['errors'] = $errors;

        //return response($response, $code);
        parent::__construct(response($response, $code));
    }
}
