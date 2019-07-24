@extends('layouts.default2')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">

                    <form method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Name:</label>

                            <div class="col-md-6">
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" autofocus>


                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Color:</label>

                            <div class="col-md-6">
                                <input type="text" name="color" value="{{old('color')}}" class="form-control @error('color') is-invalid @enderror" autofocus>


                                @error('color')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Image:</label>
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control-file  @error('image') is-invalid @enderror">
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror


                            </div>
                        </div>

                        <div class="form-group row mb-0 ml-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    Save
                                </button>
                            </div>
                        </div>















                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
