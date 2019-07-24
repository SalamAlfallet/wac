@extends('layouts.default2')
@section('titlepage')
<br>
Permissions Panel
@endsection

@section('content')






@if (session('message'))
<div class="alert alert-success">

{{session('message')}}
</div>
@endif

<div class="row ">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h1>Create permosion</h1>
                <br>




                <form method="post" action="{{route('admin.permissions.store')}}"  class="form-inline">
                @csrf
                    <input type="text" name="name" placeholder="Name" class="form-control mr-2">
                    <input type="text" name="code" placeholder="Code" class="form-control mr-2">

                    <button type="submit" class="btn btn-info ml-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<table data-toggle="table" data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
    <thead>

        <tr>
            <th>
                <div class="th-inner sortable both asc">
                   ID

                </div>
                <div class="fht-cell">
                </div>
            </th>
            <th style="">
                <div class="th-inner sortable both">
                    name
                </div>
                <div class="fht-cell">
                </div>
            </th>

            <th style="">
                <div class="th-inner sortable both">
                    Code
                </div>
                <div class="fht-cell">
                </div>
            </th>

            <th colspan="2">

                <div class="th-inner sortable both">
                    Action
                </div>

                <div class="fht-cell">
                </div>

            </th>
        </tr>


    </thead>
    <tbody>
    @foreach($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>

            <td>{{$permission->code}}</td>
            <td>
                <a class="btn btn-primary" href=""> Edit</a>


            </td>
            <td>


                <form method="post" action="{{ route('admin.permissions.delete', [ 'id' => $permission->id ]) }}">
                    @method('DELETE')
                    @csrf
                    <!-- <a  class="btn btn-danger"> Delete</a> -->

                    <button type="submit" class="btn btn-danger"> Delete </button>


                </form>
            </td>


        </tr>
        @endforeach
    </tbody>

</table>

<br>
{{$permissions->links()}}
@endsection
