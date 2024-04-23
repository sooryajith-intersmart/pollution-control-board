<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use BadMethodCallException;
use Illuminate\Session\TokenMismatchException;
use ErrorException;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException || $exception instanceof ErrorException) {
            return response()->view('frontend::errors.404', [], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof HttpException && $exception->getStatusCode() === 500) {
            return response()->view('frontend::errors.500', [], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($exception instanceof ModelNotFoundException || $exception instanceof BadMethodCallException) {
            return response()->view('frontend::errors.404', [], Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
    }
}
