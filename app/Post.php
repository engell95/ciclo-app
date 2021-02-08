<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'title','body','iframe','image','iduser', 'slug'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'iduser');
    }

    public function getGetExcerptAttribute($key)
    {
        return substr($this->body,500);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getGetImageAttribute()
    {
        if($this->image){
            return url("storage/$this->image");
        }
    }
}
