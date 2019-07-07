<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\PostCategory;

class CategoryController extends Controller


{
    public function indexCategory(){

        return view('admin.category.index')->with([
        'Category'=> Category::paginate(2),


      ]);

    }

 /// view form add category
        public function createCategory(){

              return view('admin.category.createCategory');

     }



  public function storeCategory(Request $request){

       $request->validate([

     'name'=> 'required|max:255'
         ]);
         $category= new Category();
         $category->name=$request->input('name');
         $category->save();


       return redirect(route('admin.category'))->
       with('message',sprintf('Category: "%s" add success !',$category->name));

}


      public function editCategory($id){
          $category=Category::findOrfail($id);

             return  view('admin.category.editCategory',[
           'Category'=>  $category ,


            ]);

 }

 public function updateCategory(Request $request,$id){
    $category=Category::findOrfail($id);
    $category->name=$request->input('name');
   $category->save();
   return redirect(route('admin.category'))->
   with('message',sprintf('Category: "%s" update success !',$category->name));

}


public function delete($id){

    $category=Category::findOrfail($id);

    $category->delete();
    return redirect(route('admin.category'))
    ->with('message',sprintf('Category "%s" deleted!',$category->name));

}
}
