<?php

namespace Core\Models;

class User extends \Illuminate\Database\Eloquent\Model
{

    public function authenticate($apikey){
        $user = User::where('apikey', $apikey)->first();
        $this->details = $user;

        return $user ? true : false;
    }
}