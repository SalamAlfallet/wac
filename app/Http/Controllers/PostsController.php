<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;

use App\PostStat;
use DB;

class PostsController extends Controller
{
    public function index(){

      $posts=  Post::published()->orderBy('created_at','DESC')->simplePaginate(10);
    $mostview=Post::with('stat')->orderBy('id','ASC')->limit(3)->get();
        return view('posts.index') ->with([

            // 'posts' =>Post::where('status','=','published')->orderBy('created_at','DESC')->get(),
            'posts' => $posts,
           'mostview'=>$mostview,
             'title' => '<h2>Title</h2>',

        ]);
    }

    public function createCategory(){

        return "salam";

    }

    public function view($id){
            // $post=Post::where('status','=','published')->find($id);
            $post=Post::published()->find($id);

        if(!$post){
            abort(404);
        }
        PostStat::updateOrCreate(
            ['post_id' => $post->id ],
            ['views' => DB::raw('views +1 ')]
        );

        // if($post->status != 'published'){
        //     abort(404);
        // }
        return view('posts.view',[
            'posts'=> $post

          ]  );


        // 'View Post : '. $id . 'Action :' .$name ;
    }


    public function categoryposts($id){

       $posts= Category::with('posts')->where('id' ,'=',$id)->get();
        return view('posts.categoryOfpost',[
            'posts'=> $posts

          ]  );

    }
    // public function view($id,$name =''){

    //     return view('posts.view',[
    //               'id' => $id,
    //              'action' => $name

    //                     ]);

    //     // 'View Post : '. $id . 'Action :' .$name ;
    // }
}
