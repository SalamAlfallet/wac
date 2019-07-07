@extends('layouts.default2')
@section('titlepage')
<br>
Tags Panel
@endsection

@section('content')



{{-- <a  class="btn btn-info" href="{{route('admin.tag.create')}}"> add tag</a> --}}


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
@foreach($Tags as $tags)
<tr>
<td>{{ $tags->id }}</td>
<td>{{ $tags->name  }}</td>
<td>{{ $tags->created_at}}</td>
<td>{{ $tags->updated_at}}</td>
<td >
        <a  class="btn btn-primary" href="{{ route('admin.tag.edit', [ 'id' => $tags->id ]) }}"> Edit</a>

        </td>
<td>

<!-- <a  class="btn btn-danger"> Delete</a> -->
<form method="post" action="{{ route('admin.tag.delete', [ 'id' => $tags->id ]) }}" >
        @csrf
        @method('DELETE')
<button type="submit" class="btn btn-danger"> Delete </button>


</form>
</td>


</tr>

@endforeach
</tbody>

</table>
<br>

{{ $Tags->links()}}


@endsection

