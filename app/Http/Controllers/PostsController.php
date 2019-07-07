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
    //
//  protected $posts=[
// 1=>[
// 'id'=> 1,
// 'title' =>'post 1',
// 'content'=>'Post content ....'
//     ],
//     2=>[
//         'id'=> 2,
//         'title' =>'post 2',
//         'content'=>'Post content ....'
//             ],

//             3 =>[
//                 'id'=> 3,
//                 'title' =>'post 3',
//                 'content'=>'Post content ....'
//                     ],
//  ];


    public function index(){

        return view('posts.index') ->with([
            // 'posts'=> Post::all(),
            // 'posts' =>Post::where('status','=','published')->orderBy('created_at','DESC')->get(),
            'posts' =>Post::published()->orderBy('created_at','DESC')->simplePaginate(10),
// 'posts'=> $this->posts,
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
