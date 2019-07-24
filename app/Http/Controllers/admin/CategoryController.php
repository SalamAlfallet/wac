<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\PostCategory;

class CategoryController extends Controller


{
    public function indexCategory()
    {

        return view('admin.category.index')->with([
            'Category' => Category::paginate(2),


        ]);
    }

    /// view form add category
    public function createCategory()
    {

        return view('admin.category.createCategory');
    }



    public function storeCategory(Request $request)
    {

        $request->validate([

            'name' => 'required|max:255',
            'image' => 'required|image',
            'color' => 'required|max:255'
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('category', 'public');
        } else {

            $path = null;
        }

        $category = new Category();
        $category->name = $request->input('name');
        $category->color = $request->input('color');
        $category->image = $path;

        $category->save();


        return redirect(route('admin.category'))->with('message', sprintf('Category: "%s" add success !', $category->name));
    }


    public function editCategory($id)
    {
        $category = Category::findOrfail($id);

        return  view('admin.category.editCategory', [
            'Category' =>  $category,


        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrfail($id);


        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('category', basename($category->image), 'public');
            $category->image = $path;
        }

        $category->name = $request->input('name');
        $category->color = $request->input('color');

        $category->save();
        return redirect(route('admin.category'))->with('message', sprintf('Category: "%s" update success !', $category->name));
    }


    public function delete($id)
    {

        $category = Category::findOrfail($id);

        $category->delete();
        return redirect(route('admin.category'))
            ->with('message', sprintf('Category "%s" deleted!', $category->name));
    }
}
