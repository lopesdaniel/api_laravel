<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;



trait ApiException{
    

    /**
     * Tratamento das exceções da API
     */
    public function getJsonException($request, $e)
    {
        if($e instanceof ModelNotFoundException){
            return $this->notFoundException();
        }
    }
    
    /**
     * Retorna o erro 404
     */
    public function notFoundException()
    {
        return $this->getResponse(
            "Recurso não encontrado",
            "01",
            404
        );
    }

    /**
     * Respota genérica
     */
    public function getResponse($message, $code, $status)
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