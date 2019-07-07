<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        // return $this->hasMany(PostCategory::class,'post_id','id');
        return $this->belongsToMany(Post::class,'post_tag','tag_id','post_id');



    }

}
