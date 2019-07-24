@extends('layouts.default2')

@section('titlepage')
<br>
Edit Post
@endsection


@section('style')
<style>
    .image {

        margin-left: 177px;
    }
</style>
@endsection


@section('content')
<?php
$catpost = \App\Post::post($post->id);
$postids = \App\PostCategory::select('post_id')->get()->toArray();


//   dd( $data)
//  dd($catpost)
// dd($postids)
?>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <form method="post" action="{{ route('admin.posts.update', [ 'id' => $post->id ]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="position-relative row form-group">
                        <label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{old('title', $post->title )}}" class="form-control">
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="exampleText" class="col-sm-2 col-form-label">Content
                        </label>
                        <div class="col-sm-10"><textarea rows="6" name="content" class="form-control">{{$post->content}}</textarea>
                        </div>
                    </div>


                    <div class="position-relative row form-group  ">
                        <label class="col-sm-2 col-form-label">Status</label>

                        <div class="col-sm-10">
                            <div class="position-relative form-check ">
                                <label class="form-check-label ">
                                    <input type="radio" class="form-check-input " name="status" value="Draft" {{ old('status',$post->status )== 'draft' ? 'checked' : '' }}> Draft </label>
                            </div>
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" value="published" {{old('status', $post->status) == 'published' ? 'checked' : '' }}>Published </label></div>

                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="checkbox2" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <div class="position-relative form-check">


                                <label class="form-check-label">
                                    @foreach($category as $index=>$categoryType)
                                    <input name="category_id[]" type="checkbox" class="form-check-input" @if(in_array($categoryType->id,$categories))
                                    checked

                                    @endif
                                    value="{{$categoryType->id}}"
                                    >{{$categoryType->name}} <br>
                                    @endforeach
                                </label>

                            </div>
                        </div>
                    </div>



                    <div class="position-relative row form-group">
                        <label for="checkbox2" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <div class="position-relative form-check">


                                <label class="form-check-label">
                                    @foreach (App\Tag::all() as $tag )
                                    <input name="tag_id[]" type="checkbox" class="form-check-input" {{ in_array($tag->id,$tags) ? 'checked' :''}} value="{{$tag->id}}">{{$tag ->name}} <br>
                                    @endforeach
                                </label>



                            </div>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                    </div>

                    <div class="position-relative row form-group ">
                        <img class="image " src="{{ asset('storage/' . $post->image) }}" height="100">
                    </div>

                    <div class="position-relative row form-check">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






@endsection
