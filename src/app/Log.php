<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Log extends Model
{

    protected $table = "log";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}