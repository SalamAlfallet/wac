<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;


class Post extends Model
{

    use SoftDeletes;

    // Global Scope
    protected static function boot()
    {

        parent::boot();

        // refrence class post
        // static::addGlobalScope('published',function($query){
        //     $query->where('status','=','published');



        // });
    }

    // local scope
    public function  scopePublished($query)
    {
        $query->where('status', '=', 'published');
        //   $query->orderBy('created_at','DESC');
    }

    public function  scopeDraft($query)
    {
        $query->where('status', '=', 'draft');
        $query->orderBy('created_at', 'DESC');
    }

    // public function get_category_post(){
    //     // return $this->hasMany(PostCategory::class,'post_id','id');
    //     return $this->hasMany('App\PostCategory','post_id','id');



    // }

    public function categories()
    {
        // return $this->hasMany(PostCategory::class,'post_id','id');
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function getCatogry()
    {
        $data = Post::leftJoin('App\PostCategory', 'post_id', '=', 'id')
            ->leftJoin('App\Category', 'id', '=', 'category_id')->get();
    }


    public static function post($id)
    {
        return DB::table('posts')
            ->leftjoin('post_category', 'posts.id', '=', 'post_id')
            ->leftjoin('categories', 'categories.id', '=', 'category_id')
            //  ->leftjoin('post_tag','posts.id','=','post_id')
            //  ->leftjoin('tags','tags.id','=','tag_id')
            ->where(['posts.id' => $id])

            ->orderBy('posts.id', 'DESC')
            ->get();
    }


    public static function postTags($id)
    {
        return DB::table('posts')
            ->leftjoin('post_tag', 'posts.id', '=', 'post_id')
            ->leftjoin('tags', 'tags.id', '=', 'tag_id')
            ->where(['posts.id' => $id])

            ->orderBy('posts.id', 'DESC')
            ->get();
    }

    public static function postcatid($id)
    {
        return DB::table('posts')
            ->select('category_id')
            ->leftjoin('post_category', 'posts.id', '=', 'post_id')
            ->leftjoin('categories', 'categories.id', '=', 'category_id')
            ->where(['posts.id' => $id])

            ->orderBy('posts.id', 'DESC')
            ->get();
    }


    public function stat()
    {

        return $this->hasOne(PostStat::class)->withDefault();
    }
}
