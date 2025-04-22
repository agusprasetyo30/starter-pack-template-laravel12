<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle NotFoundException
        $exceptions->render(function (App\Exceptions\NotFoundException $e) {
            return $e->render();
        });

        // Handle server errors
        $exceptions->render(function (App\Exceptions\ServerErrorException $e) {
            return $e->render(request());
        });
        
        // Handle Laravel's default ModelNotFoundException
        $exceptions->render(function (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Resource not found',
                'status_code' => 404,
                'errors' => [
                    'resource' => [$e->getMessage()]
                ],
            ], 404);
        });
        
        // Handle Laravel's default NotFoundHttpException
        $exceptions->render(function (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => 'not_found',
                    'message' => 'Endpoint not found',
                    'status_code' => 404
                ], 404);
            }
        });

        // Handle Laravel's default validation exception
        $exceptions->render(function (ValidationException $e, $request) {
            if ($request->expectsJson()) {
                // set response from macro response configuration
                return Response::unprocessableContent([$e->errors()]);
            }
        });

        // Handle laravel's default server error exception
        $exceptions->render(function (Throwable $e, Illuminate\Http\Request $request) {
            if ($request->is('api/*')) {
                // set response from macro response configuration
                return Response::internalServerError($e, $e->getMessage());
            }
        });

    })->create();
