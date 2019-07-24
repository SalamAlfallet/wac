@extends('layouts.default2')
@section('titlepage')
<br>
Downloads Panel
@endsection

@section('content')





{{-- <a  class="btn btn-info" href="{{route('admin.category.create')}}"> add category</a> --}}


@if (session('success'))
<div class="alert alert-success">

{{session('success')}}
</div>
@endif
<br>
<br>



<table data-toggle="table"  data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
        <thead>

<tr>
        <th  >
                <div class="th-inner sortable both asc">
                 name

                </div>
                <div class="fht-cell">
                    </div>
                </th>
                <th style="" >
                        <div class="th-inner sortable both">
                                size
                    </div>
                    <div class="fht-cell">
                        </div>
                    </th>
                    <th style="" >
                            <div class="th-inner sortable both">
                                    Downloads
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
@foreach($download as $downloads)
<tr>
<td>{{ $downloads->name }}</td>
<td>{{ $downloads->size  }}</td>
<td>{{ $downloads->downloads}}</td>

<td >
<a  class="btn btn-primary" href="{{ route('admin.downloads.download', [ 'id' => $downloads->id ]) }}"> download</a>
<a  class="btn btn-primary" href="{{ route('admin.downloads.preview', [ 'id' => $downloads->id ]) }}"> preview</a>

</td>
<td>
<form method="post" action="{{ route('admin.downloads.delete', [ 'id' => $downloads->id ]) }}" >
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


<div class="row mt-4">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
<h1>Upload New File</h1>
<br>
<form method="post" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data" class="form-inline">
	@csrf
	<input type="text" name="name" placeholder="Name" class="form-control mr-2">
	<input type="file" name="file" placeholder="File" class="form-control mr-2">
	<button type="submit" class="btn btn-info ml-3">Upload</button>
</form>
                </div>
            </div>
        </div>
</div>


@endsection
