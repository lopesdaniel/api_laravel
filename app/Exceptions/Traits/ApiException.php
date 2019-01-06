<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;



trait ApiException{
    

    /**
     * Tratamento das exceções da API
     */
    protected function getJsonException($request, $e)
    {
        if($e instanceof ModelNotFoundException){
            return $this->notFoundException();
        }

        if($e instanceof HttpException){
            return $this->httpException($e);
        }

        if($e instanceof ValidationException){
            return $this->validationException($e);
        }

        return $this->genericException();
    }
    
    /**
     * Retorna o erro HTTP
     */
    protected function httpException($e)
    {
        return $this->getResponse(
            "Erro",
            "03",
            $e->getStatusCode()
        );
    }

    /**
     * Retorna o erro Generic
     */
    protected function genericException()
    {
        return $this->getResponse(
            "Erro Interno no Servidor",
            "01",
            500
        );
    }


    /**
     * Retorna o erro 404
     */
    protected function notFoundException()
    {
        return $this->getResponse(
            "Recurso não encontrado",
            "02",
            404
        );
    }

     /**
     * Retorna o erro HTTP
     */
    protected function validationException($e)
    {
        return response()->json($e->errors(), $e->status);
    }

    /**
     * Respota genérica
     */
    protected function getResponse($message, $code, $status)
    {
        return response()->json([
            "errors" => [
                [
                    "status" => $status,
                    "code" => $code,
                    "message" => $message
                ]
            ]
        ], $status);
    }


}