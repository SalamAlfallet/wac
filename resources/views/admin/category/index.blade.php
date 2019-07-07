@extends('layouts.default2')
@section('titlepage')
<br>
Category Panel
@endsection

@section('content')





{{-- <a  class="btn btn-info" href="{{route('admin.category.create')}}"> add category</a> --}}


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
                    <div class="fht-cell">
                        </div>
                    </th>
                    <th style="" >
                            <div class="th-inner sortable both">
                                    Created
                        </div>
                        <div class="fht-cell">
                            </div>
                        </th>
                        <th style="" >
                                <div class="th-inner sortable both">
                                        Updated
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
@foreach($Category as $category)
<tr>
<td>{{ $category->id }}</td>
<td>{{ $category->name  }}</td>
<td>{{ $category->created_at}}</td>
<td>{{ $category->updated_at}}</td>
<td >
<a  class="btn btn-primary" href="{{ route('admin.category.edit', [ 'id' => $category->id ]) }}"> Edit</a>
</td>

<td>
<form method="post" action="{{ route('admin.category.delete', [ 'id' => $category->id ]) }}" >
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
total:{{ $Category->total()}}
{{ $Category->links()}}



@endsection
