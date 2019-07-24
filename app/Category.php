<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{


    protected $table = 'categories';
    protected $fillable = ['name', 'image', 'color'];

    public $timestamps = true; // false

    protected $primaryKey = 'id';

    public $incrementing = true; // false

    protected $keyType = 'int'; // 'varchar', 'text'

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';



    public function posts()
    {
        // return $this->hasMany(PostCategory::class,'post_id','id');
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id');
    }



    public static function get_posts_by_categoryId($id)
    {
        return DB::table('posts')
            ->select('posts.title', 'posts.content', 'posts.image', 'posts.created_at', 'categories.name', 'categories.id','categories.color')
            ->leftjoin('post_category', 'posts.id', '=', 'post_id')
            ->leftjoin('categories', 'categories.id', '=', 'category_id')
            ->where(['categories.id' => $id])

            ->orderBy('posts.id', 'DESC');
    }
    // public function get_post_category(){
    //     return $this->hasMany('App\PostCategory','category_id','id');



    // }

}
