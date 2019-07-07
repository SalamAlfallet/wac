<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use App\Tag;

class TagContoller extends Controller
{
    public function indexTag(){

        return view('admin.tags.index')->with([
        'Tags'=> Tag::paginate(2),


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
public function delete($id){

    $tags=Tag::findOrfail($id);

    $tags->delete();
    return redirect(route('admin.tag'))
    ->with('message',sprintf('Tag "%s" deleted!',$tags->name));

}

public function editTag($id){
    $tags=Tag::findOrfail($id);

    return  view('admin.tags.editTags',[
  'tags'=>  $tags ,


   ]);


}



public function updateTag(Request $request,$id){
    $tags=Tag::findOrfail($id);
    $tags->name=$request->input('name');
   $tags->save();
   return redirect(route('admin.tag'))->
   with('message',sprintf('Tags: "%s" update success !',$tags->name));

}

}
