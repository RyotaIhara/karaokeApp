<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    public static $validateRule = [
        'name' => 'required',
    ];
}
