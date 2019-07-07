<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostStat extends Model
{
    //

    public $timestamps=false;
    public $incrementing= false;
    protected $guarded=[];
    protected $primaryKey='post_id';

    public function views(){

        return $this->belongsTo(Post::class,'post_id','id');
    }


}
