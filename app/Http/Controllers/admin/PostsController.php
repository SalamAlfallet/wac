<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\PostCategory;
use App\PostTag;
use DB;

class PostsController extends Controller
{

    //

    public function __construct()
    {


        $this->middleware('auth');

    }

    public function index()
    {

        //  return  $Post = Post::with('get_category_post')->where('id','=',10)->get();
        //  $categories = Category::with('get_post_category')->get();



        // PostCategory::with(['get_posts','get_category'])->get();

        $title = request()->query('title', '');
        $status = request()->query('status', '');
        $category_id = request()->query('category_id', '');

        // $catpost= Post::post();
        // $this->data['cat']=$catpost;
        return view('admin.posts.index')->with([
            // 'posts'=> Post::all(),
            'posts' => Post::
            // with('categories')
                select('posts.*')
                ->leftJoin('post_category', 'posts.id', '=', 'post_category.post_id')

                ->when($title, function ($query, $title) {
                    return $query->where('title', 'LIKE', '%' . $title . '%');
                })
                ->when($status, function ($query, $status) {
                    return $query->where('status', 'LIKE', '%' . $status . '%');
                })
                ->when($category_id, function ($query, $category_id) {

                    return $query->where('category_id', '=', $category_id);
                    // whereIn($category_id,\App\PostCategory::select('category_id')->distinct('category_id')->get()->toArray());







                })


                //   ->select('posts.*', 'post_category.category_id as category_id')
                // ->when($category_id,function($query,$category_id){
                //     return $query->where('category_id','=',$category_id);


                //   ->where('title','LIKE','%'.$title.'%')
                //   ->where('status','LIKE','%'.$status.'%')
                ->orderBy('posts.id', 'desc')->distinct()->paginate(3),

            // 'posts'=> Post::withTrashed()->get(),



        ]);
    }

    public function trashed()
    {

        return view('admin.posts.trashed')->with([

            'posts' => Post::withTrashed()->paginate(3)



        ]);
    }

    public function restore(Request $request, $id)
    {


        $post = Post::onlyTrashed()->where('id', '=', $id)->first();
        // $post=Post::onlyTrashed()->findOrfail($id);;
        $post->restore();
        return redirect(route('admin.posts'))->with('message', sprintf('Post "%s" restore!', $post->title));;;
    }

    public function forceDelete($id)
    {
        //$post = Post::onlyTrashed()->where('id', '=', $id)->first();
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect(route('admin.posts.trashed'))
            ->with('message', sprintf('Post "%s" deleted!', $post->title));
    }

    // view form add posts
    public function create()
    {
        $category = category::all();
        $this->data['category'] = $category;
        // $this->data['user'] = $category;


        return   view('admin.posts.create', $this->data);
    }

    // add posts
    public function store(Request $request)
    {
        //$new_cat=new PostCategory();


        if($request->hasFile('image')){
         $image = $request->file('image');
        $path = $image->store('images', 'public');
        }else{

          $path=null;
        }

        $request->validate([

            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'status' =>'required',
            'category_id' =>'required',
             'tag_id' =>'required'


        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $path;
        $post->status = $request->input('status');
        $post->save();
        $cat = $request->input('category_id');
        //return $cat;
        foreach ($cat as $item) {
            $new_cat = new PostCategory();
            $new_cat->category_id = $item;
            $new_cat->post_id = $post->id;
            $new_cat->save();
        }

        $tag = $request->input('tag_id');
        //return $cat;
        foreach ($tag as $item) {

            $new_tag = new PostTag();
            $new_tag->tag_id = $item;
            $new_tag->post_id = $post->id;
            $new_tag->save();
        }




        return redirect(route('admin.posts'))->with('message', sprintf('Post "%s" add!', $post->title));;
    }


    /// view form edit
    public function edit($id)
    {
        //    $post=Post::findOrfail($id);


        $categories = PostCategory::where('post_id', '=', $id)->pluck('category_id')->toArray();
        $this->data['categories'] = $categories;
        // return($categories);
        //    $post = Post::with('get_category_post')->where('id','=',$id)->first();

        $post = Post::findOrfail($id);
        $this->data['post'] = $post;

        $category = category::all();
        $this->data['category'] = $category;

        $tags = PostTag::where('post_id', '=', $id)->pluck('tag_id')->toArray();
        // $post->tags->pluck('id')->toArray();
        $this->data['tags'] = $tags;


        return  view('admin.posts.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
        // return $request;


        $request->validate([

            'title' => 'required',
            'content' => 'required',
            'image' => 'image'

        ]);

        $post = Post::findOrfail($id);
        //    $catpost= Post::post($id);
        $image = $request->file('image');

        if ($image && $image->isValid()) {
            $path = $image->storeAs('images', basename($post->image), 'public');
            $post->image = $path;
        }



        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->status = $request->input('status');
        $post->save();

        $cat = $request->input('category_id');

        $categoryOfPost = PostCategory::where(['post_id' => $id])->delete();

        $post->categories()->sync($cat);
        //  dd($categoryOfPost);
        // foreach ($categoryOfPost as $categoryOfPost) {
        //     $categoryOfPost->delete();
        // }

        // foreach ($cat as $item) {
        //     $new_cat = new PostCategory();

        //     $new_cat->category_id = $item;
        //     $new_cat->post_id = $post->id;
        //     $new_cat->save();
        // }
        $tagOfPost = PostTag::where(['post_id' => $id])->delete();
        //  dd($categoryOfPost);
        // foreach ($tagOfPost as $tagOfPost) {
        //     $tagOfPost->delete();
        // }


        $tag = $request->input('tag_id');

        $post->tags()->sync($tag);
        // foreach ($tag as $item) {

        //     $new_tag = new PostTag();
        //     $new_tag->tag_id = $item;
        //     $new_tag->post_id = $post->id;
        //     $new_tag->save();
        // }


        return redirect(route('admin.posts'))->with('message', sprintf('Post "%s" Updated!', $post->title));
    }



    public function delete($id)
    {

        $post = Post::findOrfail($id);

        $post->delete();
        return redirect(route('admin.posts'))
            ->with('message', sprintf('Post "%s" deleted!', $post->title));
    }
    //  *************** start function category *************


    public function indexCategory()
    {

        return view('admin.category.index')->with([
            'Category' => Category::all(),


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

            'name' => 'required|max:255|min:10'
        ]);
        $category = new Category();
        $category->name = $request->input('name');
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
        $category->name = $request->input('name');
        $category->save();
        return redirect(route('admin.category'))->with('message', sprintf('Category: "%s" update success !', $category->name));
    }
}
