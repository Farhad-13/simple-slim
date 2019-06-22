<?php

namespace Core\Models;

class Rate extends \Illuminate\Database\Eloquent\Model
{
    // protected $table = "rates";
    protected $fillable = ['post_id', 'user_id', 'rate'];
    // public $timestamps = false;


}