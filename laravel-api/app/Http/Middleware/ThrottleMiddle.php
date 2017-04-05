<?php
namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Middleware\ThrottleRequests;


class ThrottleMiddle extends ThrottleRequests
{
    protected function buildResponse($key, $maxAttempts)
    {
        $message = json_encode([
            'error' => [
                'message' => 'Too many attempts, please slow down the request.'
            ],
            'status' => 500
        ]);

        $response = new Response($message, 429);

        $retryAfter = $this->limiter->availableIn($key);

        return $this->addHeaders(
            $response, $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );
    }
}