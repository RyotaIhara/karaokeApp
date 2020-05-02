<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    public static $validateRule = [
        'scene_name' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scene_name', 'scene_remark'
    ];
}
