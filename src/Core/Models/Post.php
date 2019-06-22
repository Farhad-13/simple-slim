<?php

namespace Core\Models;

class Post extends \Illuminate\Database\Eloquent\Model
{
    public function rates(){
        return $this->hasMany(Rate::class, 'post_id');
    }
}