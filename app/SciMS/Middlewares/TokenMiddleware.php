<?php

namespace SciMS\Middlewares;

use \Slim\Http\Request;
use \Slim\Http\Response;
use SciMS\Models\UserQuery;

class TokenMiddleware {

    const INVALID_TOKEN = 'INVALID_TOKEN';

    /**
     * Checks if the given token is valid.
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response a JSON containing errors if the given token is invalid.
     */
    public function __invoke(Request $request, Response $response, callable $next) {
        $token = explode(' ', $request->getHeaderLine('Authorization'))[1];

        if (!$token) {
            return $this->invalidToken($response);
        }

        // Retreives the user associated with the given token
        $user = UserQuery::create()->findOneByToken($token);
        if (!$user) {
            return $this->invalidToken($response);
        }

        // Checks the token validity
        $today = new \DateTime();
        if ($user->getTokenExpiration() >= $today->getTimestamp()) {
            return $this->invalidToken($response);
        }

        // Add user informations to the request
        $request = $request->withAttribute('user', $user);

        return $next($request, $response);
    }

    private function invalidToken(Response $response) {
        return $response->withJson(array(
            "errors" => array(
                self::INVALID_TOKEN
            )
        ), 401);
    }

}
