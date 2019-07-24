@extends('layouts.default2')

@section('titlepage')
<br>
Create Post
@endsection

@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">

                <form method="post" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="position-relative row form-group">
                        <label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title')  }}" class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                        </div>
                    </div>



                    <div class="position-relative row form-group">
                        <label class="col-sm-2 col-form-label">Content
                        </label>
                        <div class="col-sm-10"><textarea rows="6" name="content" class="form-control">{{ old('content')  }}</textarea>
                            @error('content')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                        </div>
                    </div>

                    <div class="position-relative row form-group  ">
                        <label class="col-sm-2 col-form-label">Status</label>

                        <div class="col-sm-10">
                            <div class="position-relative form-check ">
                                <label class="form-check-label ">
                                    <input type="radio" class="form-check-input " name="status" value="Draft"> Draft </label>

                            </div>
                            <div class="position-relative form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" value="published">Published </label>

                            </div>
                            @error('status')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- --}}


                    <div class="position-relative row form-group">
                        <label for="checkbox2" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <div class="position-relative form-check">


                                <label class="form-check-label">
                                    @foreach($category as $categoryType)
                                    <input name="category_id[]" type="checkbox" class="form-check-input" value="{{$categoryType->id}}">{{$categoryType->name}} <br>
                                    @endforeach
                                </label>

                            </div>
                            @error('category_id')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>





                    <div class="position-relative row form-group">
                        <label for="checkbox2" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <div class="position-relative form-check">


                                <label class="form-check-label">
                                    @foreach (App\Tag::all() as $tag )
                                    <input name="tag_id[]" type="checkbox" class="form-check-input" value="{{$tag->id}}">{{$tag ->name}} <br>
                                    @endforeach
                                </label>



                            </div>

                            @error('tag_id')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="position-relative row form-group">
                        <label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control-file">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror


                        </div>
                    </div>






                    <button type="submit" class="btn btn-primary">Save </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
