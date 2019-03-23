<?php

namespace CMSTutorial;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'user_id'];
    public function user() {
        return $this->belongsTo('CMSTutorial\User');
    }
}
