<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = true; // false

    protected $primaryKey = 'id';

    public $incrementing = true; // false

    protected $keyType = 'int'; // 'varchar', 'text'

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';



    public function posts(){
        // return $this->hasMany(PostCategory::class,'post_id','id');
        return $this->belongsToMany(Post::class,'post_category','category_id','post_id');



    }
    // public function get_post_category(){
    //     return $this->hasMany('App\PostCategory','category_id','id');



    // }

}
