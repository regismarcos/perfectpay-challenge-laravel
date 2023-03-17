<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request $request
     * @param  Exception $e
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $e): Response
    {
        if ($e instanceof InvalidArgumentException) {
            $e = new HttpException(Response::HTTP_BAD_REQUEST, $e->getMessage());
        }
        if ($e instanceof RuntimeException) {
            $e = new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }

        return parent::render($request, $e);
    }

    /**
     * Report or log an exception.
     *
     * @param Exception $e
     * @return void
     * @throws Throwable
     */
    public function report(Throwable $e): void
    {
        parent::report($e);
    }
}
