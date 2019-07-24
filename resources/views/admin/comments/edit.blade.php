@extends('layouts.default2')

@section('titlepage')
<br>
Edit Status
@endsection

@section('style')
<style>
    .text_bold {

        font-weight: bold;
    }
</style>

@endsection
@section('content')




<div class="main-card mb-3 card mt-3">
    <div class="card-body">

        <div class="divider"></div>
        <div class="jumbotron" data-step="1" data-intro="This is a tooltip!">

            <div>
            <form method="post" action="{{ route('admin.comments.update', [ 'id' => $comment->id ]) }}" >
                    @method('PUT')
                    @csrf
                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                        <label for="exampleEmail22" class="mr-sm-2">Name:</label>
                        <p class="text_bold">{{$comment->name}}</p>
                    </div>
                    <hr class="my-4">
                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                        <label for="exampleEmail22" class="mr-sm-2">Email:</label>
                        <p class="text_bold">{{$comment->email}}</p>
                    </div>

                    <hr class="my-4">
                    <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                        <label for="exampleEmail22" class="mr-sm-2">Comment:</label>
                        <p class="text_bold">{{$comment->comment}}</p>
                    </div>
                    <hr class="my-4">


                    <label for="exampleEmail22" class="mr-sm-2">Status:</label>
                    <div class="position-relative form-check form-check-inline">

                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input sm-1 " name="status" value="Draft" {{ old('status',$comment->status )== 'draft' ? 'checked' : '' }}> Draft
                        </label></div>
                    <div class="position-relative form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input sm-1 " name="status" value="published" {{old('status', $comment->status) == 'published' ? 'checked' : '' }}>Published </label></div>




            </div>
            <hr class="my-4">

            <p class="lead">
                <button  type="submit" class="btn btn-primary btn-lg" >Save</button>
            </p>
        </div>

        </form>

    </div>
</div>
@endsection
