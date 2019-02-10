<?php

namespace App\Exceptions;

use Exception;
use Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Standard JSON response codes and messages
     *
     * @var array
     */
    protected $jsonResponses = [
        404 => 'Not Found',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->wantsJson()) {
            switch (true) {
                case $exception instanceof ModelNotFoundException:
                case $exception instanceof NotFoundHttpException:
                    return $this->jsonResponse(404);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Render a JSON response by providing the HTTP code.
     *
     * @param string $code
     * @return \Illuminate\Http\Response
     */
    protected function jsonResponse($code)
    {
        return response()->json(
            [
                'message' => $this->jsonResponses[$code]
            ],
            $code
        );
    }
}
