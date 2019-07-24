@extends('layouts.default2')

@section('titlepage')
<br>
Se Panel
@endsection

@section('content')


@if (session('message'))
<div class="alert alert-{{session('type')}}">

{{session('message')}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">

                    <form method="POST" action="{{route('admin.web.setting.update')}}" enctype="multipart/form-data">
                    @csrf
                    @foreach($Settings as $settings)
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{$settings->constant}}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('{{$settings->constant}}') is-invalid @enderror" name="{{$settings->constant}}" value="{{ old($settings->constant,$settings->value)}}"   autofocus>

                                @error('{{$settings->constant}}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @endforeach


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
