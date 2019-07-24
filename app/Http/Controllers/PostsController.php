<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;

use App\PostStat;
use App\Setting;
use DB;

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // $title=Setting::where('constant', 'title')->pluck('value')->toArray();
        // $title_value=$title[0];
    }
    public function index()
    {
        // $posts=  Post::published()->orderBy('created_at','DESC')->limit(2)->get();
        // return Post::with('user')->get();
        // //return $posts;
        // $posts1=  Post::published()->orderBy('created_at','DESC')->offset(2)->take(2)->get();
        $posts =  Post::published()->orderBy('created_at', 'DESC')->simplePaginate(10);
        $mostview = Post::with('stat')->orderBy('id', 'DESC')->limit(2)->get();
        return view('posts.index')->with([

            // 'posts' =>Post::where('status','=','published')->orderBy('created_at','DESC')->get(),
            'posts' => $posts,
            'mostview' => $mostview,
            'title' => '<h2>Title</h2>',

        ]);
    }

    public function index2()
    {
        // $posts=  Post::published()->orderBy('created_at','DESC')->limit(2)->get();

        // //return $posts;
        $cats = Category::latest()->limit(3)->get();

        $mostViewFirst =  Post::mostView()->first();
        $mostView =  Post::mostView()->offset(1)->limit(3)->get();
        $posts1 =  Post::published()->orderBy('id', 'DESC')->first();
        $posts2 =  Post::published()->orderBy('id', 'DESC')->offset(1)->first();
        $postsall =  Post::published()->orderBy('id', 'DESC')->offset(2)->take(2)->get();
        $posts =  Post::published()->orderBy('created_at', 'DESC')->limit(3)->get();
        //  dd($mostViewFirst->categories()) ;
        $mostview = Post::with('stat')->orderBy('id', 'DESC')->limit(2)->get();
        return view('posts.index2')->with([

            // 'posts' =>Post::where('status','=','published')->orderBy('created_at','DESC')->get(),
            'posts' => $posts,
            'posts1' => $posts1,
            'posts2' => $posts2,
            'postsall' => $postsall,
            'mostViewFirst' => $mostViewFirst,
            'mostview' => $mostView,
            'cats' => $cats,
            'title' => '<h2>Title</h2>',

        ]);
    }

    public function createCategory()
    {

        return "salam";
    }

    public function view($id)
    {
        // $post=Post::where('status','=','published')->find($id);
        $post = Post::published()->find($id);

        if (!$post) {
            abort(404);
        }
        PostStat::updateOrCreate(
            ['post_id' => $post->id],
            ['views' => DB::raw('views +1 ')]
        );

        // if($post->status != 'published'){
        //     abort(404);
        // }
        return view('posts.view', [
            'posts' => $post

        ]);


        // 'View Post : '. $id . 'Action :' .$name ;
    }


    public function categoryposts($id)
    {


        $category = Category::with('posts')->where('id', '=', $id)->first();


        return view('posts.categoryOfpost', [
            'posts' => $category->posts()->paginate(3),
            "category" => $category


        ]);
    }


    public function addLike($id)
    {


// return $id;
        $post = Post::published()->find($id);

        if (!$post) {
            abort(404);
        }


        $contol_like = PostStat::where('post_id', '=', $id)->pluck('likes')->toArray();
        $like_value = $contol_like[0];
        if ($like_value == 0) {
        $post_likes = PostStat::updateOrCreate(
            ['post_id' => $post->id],
            ['likes' => '1']
        );
    }else{
        $post_likes = PostStat::updateOrCreate(
            ['post_id' => $post->id],
            ['likes' => '0']
        );

    }

        return  $post_likes->likes;
    }
}
