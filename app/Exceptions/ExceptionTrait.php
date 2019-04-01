<?php
/**
 * Created by PhpStorm.
 * User: chesvic Lordgape
 * Date: 01/04/2019
 * Time: 14:46
 */

namespace App\Exceptions;

define("MODEL_NOT_FOUND_ERROR_CODE",1002);
define("HTTP_NOT_FOUND_ERROR_CODE",1003);



use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait {

    public function apiException($request,$exception)
    {
        // Check if exception was cause by missing model. Occurs when the specify model is not in DB
        if($this->isModelException($exception))
        {
            return $this->modelExceptionResponse();
        }

        // Check if exception was cause by incorrect route

        if($this->isHTTPException($exception))
        {
            return $this->httpExceptionResponse();
        }

        return parent::render($request, $exception);
    }

    protected function isModelException($exception)
    {
        return $exception instanceof ModelNotFoundException;
    }

    protected function isHTTPException($exception)
    {
        return $exception instanceof NotFoundHttpException;
    }

    protected function modelExceptionResponse()
    {
        return response([
            "errors" =>
                [
                    "error_code" => MODEL_NOT_FOUND_ERROR_CODE,
                    "error_message" =>  "Requested model was not found"
                ]
        ],Response::HTTP_NOT_FOUND);
    }

    protected function httpExceptionResponse()
    {
        return response([
            "errors" =>
                [
                    "error_code" => HTTP_NOT_FOUND_ERROR_CODE,
                    "error_message" =>  "Incorrect Route"
                ]
        ],Response::HTTP_NOT_FOUND);
    }


}