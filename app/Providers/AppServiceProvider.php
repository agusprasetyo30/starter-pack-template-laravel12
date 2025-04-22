<?php

namespace App\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;
use Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // This macro will be used to return a successful response with a 200 status code
        Response::macro('ok', function ($data = [], $message = 'OK'): JsonResponse {
            return response()->json([
                'status' => "success",
                'message' => $message,
                'data' => $data,
            ], 200);
        });

        // This macro will be used to return a successful response wwith a 201 status code
        Response::macro('created', function ($data = [], $message = 'Created', $showRequest = false, $showResponseCode = false): JsonResponse {
            return response()->json([
                'status' => "success",
                'response_code' => $showResponseCode ? 201 : null,
                'message' => $message,
                'data' => $showRequest ? $data : null,
            ], 201);
        });

        // This macro will be used to return unauthorized response with a 401 status code
        Response::macro('unauthorized', function ($data = [], $message = 'Unauthorized'): JsonResponse {
            return response()->json([
                'status' => "forbidden",
                'message' => $message,
                'data' => $data,
            ], 401);
        });
        
        // This macro will be used to return forbidden response with a 403 status code
        Response::macro('forbidden', function ($data = [], $message = 'Forbidden'): JsonResponse {
            return response()->json([
                'status' => "forbidden",
                'message' => $message,
                'data' => $data,
            ], 403);
        });

        // This macro will be used to return not found response with a 404 status code
        Response::macro('notFound', function ($data = [], $message = 'Not Found'): JsonResponse {
            return response()->json([
                'status' => "not_found",
                'message' => $message,
                'data' => $data,
            ], 404);
        });

        // This macro will be used to return conflict response with a 409 status code
        Response::macro('conflict', function ($data = [], $message = 'Conflict'): JsonResponse {
            return response()->json([
                'status' => "conflict",
                'message' => $message,
                'data' => $data,
            ], 409);
        });
        
        // This macro will be used to return unprocessable content / validation response with a 422 status code
        Response::macro('unproccessableContent', function ($data = [], $message = 'Unprocessable Content', $responseCode = 422): JsonResponse {
            return response()->json([
                'status' => "failed",
                'message' => $message,
                'response_code' => $responseCode,
                'errors' => $data,
            ], $responseCode);
        });

        // This macro will be used to return internal server error response with a 500 status code
        Response::macro('internalServerError', function ($data, $message = 'Internal Server Error', $responseCode = 500): JsonResponse {
            $response = [
                'status' => "failed",
                'message' => $message,
                'response_code' => $responseCode,
            ];
            
            // add error details if development mode
            if (config('app.debug')) {
                $response['errors'] = $data->errorDetails ?? [
                    'exception' => get_class($data),
                    'file' => $data->getFile(),
                    'line' => $data->getLine(),
                    'trace' => $data->getTrace()
                ];
            }

            return response()->json($response, $responseCode);
        });
    }
}
