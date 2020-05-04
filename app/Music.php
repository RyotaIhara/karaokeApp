<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function scene() {
        return $this->belongsTo('App\Scene');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','category_id','scene_id','music_title','artist',
        'music_remark','time','high_score','average_score','key',
    ];
}
