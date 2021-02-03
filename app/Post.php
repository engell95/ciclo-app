<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class, 'iduser');
    }

    public function getGetExcerptAttribute($key)
    {
        return substr($this->body,500);
    }
}
