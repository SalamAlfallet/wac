
@extends('layouts.default2')
@section('titlepage')
<br>
Create Tags
@endsection

@section('content')




<div class="row mt-4">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
<form method="post" action="{{route('admin.tag.store')}}">

@csrf



<div class="position-relative row form-group mt-3">
        <label for="exampleEmail" class="col-sm-2 col-form-label">Name Tag :</label>

        <div class="col-sm-8">

                <input type="text"  name ="name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">


                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>





        <div class="position-relative row form-check">
                <div class="col-sm-10 offset-sm-2">
                    <button  type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>







</form>
                </div>
            </div>
        </div>
    </div>
@endsection
