<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use App\Tag;

class StatController extends Controller
{
    public function index(){

        return view('admin.statistac')->with([
            'Category'=> Category::paginate(10),
             'Tag'=> Tag::paginate(10),
             'Post'=> Post::paginate(10),


          ]);




    }



    public function create(){

        return view('admin.tags.createTag');

}



public function store(Request $request){

 $request->validate([

'name'=> 'required|max:255'
   ]);
   $tag= new Tag();
   $tag->name=$request->input('name');
   $tag->save();




 return redirect(route('admin.tag'))->
 with('message',sprintf('Tag: "%s" add success !',$tag->name));

}

}
