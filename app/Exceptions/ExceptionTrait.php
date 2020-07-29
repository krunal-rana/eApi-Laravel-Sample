<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait

{
    public function apiException($request, $e)
    {


        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'errors' =>   'Product model not found'
            ], 404);
        }


        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'errors' =>   'incorrect route'
            ], 404);
        }

        return parent::render($request, $e);
    }
}
