@extends('layouts.default2')

@section('titlepage')

<br>
Comments Panel
@endsection

@section('content')



@section('style')


<style>



</style>

@endsection


@if (session('message'))
<div class="alert alert-success">

    {{session('message')}}
</div>
@endif


<table data-toggle="table" data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover mt-4">
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
                    Name
                </div>
                <div class="fht-cell">
                </div>
            </th>
            <th style="">
                <div class="th-inner sortable both">
                    Email
                </div>
                <div class="fht-cell">
                </div>
            </th>



            <th style="">

                <div class="th-inner sortable both">
                    website


                </div>

                <div class="fht-cell">
                </div>

            </th>


            <th style="">

<div class="th-inner sortable both">
    Created


</div>

<div class="fht-cell">
</div>

</th>

            <th style="">

                <div class="th-inner sortable both">
                    Updated
                </div>

                <div class="fht-cell">
                </div>

            </th>
            <th style="">

                <div class="th-inner sortable both">
                    Status


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


        @foreach($comments as $comment)

        <tr>
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->name  }}</td>
            <td>{{ $comment->email}}</td>
            <td>{{ $comment->website}}</td>
            <td>{{ $comment->created_at->format('l, F d, Y')}}</td>
            <td>{{ $comment->updated_at}}</td>
            <td> {{$comment->status}}</td>

            <td class="text-center">
                <a class="btn btn-success" href="{{ route('admin.comments.edit', [ 'id' => $comment->id ]) }}"> Publish</a>
            </td>
            <td class="text-center">
                <form method="post" action="{{ route('admin.comments.delete', [ 'id' => $comment->id ]) }}">
                    @csrf
                    @method('DELETE')

                    <!-- <a  class="btn btn-danger"> Delete</a> -->

                    <button type="submit" class="btn btn-danger"> Delete </button>


                </form>

            </td>


        </tr>

        @endforeach
    </tbody>

</table>

<br>
<br>

{{ $comments->links()}}

@endsection
