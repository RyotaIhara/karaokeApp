<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $validateRule = [
        'category_name' => 'required',
    ];

    public function musics() {
        return $this->hasMany('App\Music');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'category_remark'
    ];
}
