<?php

namespace Core\Middleware;

use Core\Models\User;

class Authentication{

    public function __invoke($request, $response, $next){

        $auth = $request->getHeader('Authorization');
        $_apikey  = $auth ? $auth[0] : "";

        $user = new User();
        if(!$user->authenticate($_apikey)){
            $response->withStatus(401)->write($_apikey);
            return $response;
        }
        $response = $next($request, $response);

        return $response;
    }

}