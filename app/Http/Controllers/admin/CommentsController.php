<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use App\Tag;
use App\Comment;

class CommentsController extends Controller
{
    public function index()
    {

        return view('admin.comments.index')->with([
            'comments' => Comment::paginate(2),


        ]);
    }






    public function delete($id)
    {

        $comment = Comment::findOrfail($id);

        $comment->delete();
        return redirect(route('admin.comments'))
            ->with('message', sprintf('Comment "%s" deleted!', $comment->name));
    }

    public function edit_Status($id)
    {
        $comment = Comment::findOrfail($id);

        return  view('admin.comments.edit', [
            'comment' =>  $comment,


        ]);
    }



    public function update_Status(Request $request, $id)
    {
        $comment = Comment::findOrfail($id);
        $comment->status = $request->input('status');
        $comment->save();
        return redirect(route('admin.comments'))->with('message', sprintf('Status: "%s" update success !', $comment->name));
    }



    public function editDraft($id){
        $comment=Comment::findorFail($id);

        $comment->status='Draft';
        $comment->save();

        return redirect(route('admin.comments'))->with(
            'message',sprintf('comment "%s" Draft!',$comment->comment)
        );
     }
}
