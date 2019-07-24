<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use App\Comment;
use App\PostStat;
use DB;
use Illuminate\Support\Facades\URL;


class CommentsController extends Controller
{

    public function store(Request $request)
    {
// return $request;
        $parameters  =  url()->previous();
        $post_id = explode("/", $parameters);
        // return $post_id[4];
        $request->validate([

            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'comment' => 'required|max:255',

        ]);
        $comment = new Comment();
        $comment->post_id = $post_id[4];
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->website = $request->input('website');
        $comment->comment = $request->input('comment');
        $comment->save();


        // return view('posts.view');

      return redirect(route('posts.view', [ 'id' =>  $post_id[4] ]));
    }
}
