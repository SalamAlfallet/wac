@extends('layouts.default2')

@section('titlepage')
<br>
users Panel
@endsection

@section('content')



@section('style')


<style>

img {
  border: 1px solid #ddd;
  border-radius: 11px;
  padding: 5px;
  display: block;
  margin-left: auto;
  margin-right: auto;

}

.btn.btn-wide {

    line-height: 1.8;

}


</style>

@endsection

@if (session('message'))
<div class="alert alert-success">

{{session('message')}}
</div>
@endif
<br>
<br>


<table data-toggle="table"  data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
        <thead>
            <tr>
         <th  >
                <div class="th-inner sortable both asc">
                    ID

                </div>
                <div class="fht-cell">
                    </div>
             </th>

           <th style="" >
                <div class="th-inner sortable both">
                        name
            </div>
            <div class="fht-cell ">
                </div>
            </th>
            <th style="" >
                <div class="th-inner sortable both">
                        image
            </div>
            <div class="fht-cell">
                </div>
            </th>
            <th style="" >

                <div class="th-inner sortable both">
                        Birthday
            </div>

            <div class="fht-cell">
             </div>

            </th>
            <th style="" >

                    <div class="th-inner sortable both">
                            Country
                </div>

                <div class="fht-cell">
                 </div>

                </th>






                        <th colspan="2" >

                                <div class="th-inner sortable both">
                                        Action
                            </div>

                            <div class="fht-cell">
                             </div>

                            </th>
        </tr>

    </thead>
    <tbody>


            @foreach($users as $user)
            <?php

              ?>
       <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name  }}</td>

            <td> <img src="{{asset('storage/' . $user->avater)}}" height="55" width="70" ></td>

            <td>{{ $user->birthday  }}</td>

            <td>{{ $user->country  }}</td>
            <td  class="text-center" >
                 <a  class="btn btn-primary" href=""> Edit</a>
            </td>
            <td  class="text-center">
                 <form method="post" action="" >
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

{{ $users->links()}}

@endsection
