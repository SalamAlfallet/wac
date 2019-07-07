@extends('layouts.default2')

@section('titlepage')
<br>
Posts Panel
@endsection

@section('content')



@section('style')


<style>

img {
    border: 1px solid #ddd;
  border-radius: 4px;
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


<form method="get" action="{{route('admin.posts')}}" class="form-inline mb-4 ">

    <div class="input-group">
    <input type="text" name="title" placeholder="Search Title..." class="form-control mr-1 btn-outline-warning">
    </div>


    <select type="select" id="exampleCustomSelect" name="status" class="custom-select btn btn-outline-info mr-1" >
            <option value=""> Status</option>
            <option value="published">published</option>
            <option value="draft">draft</option>
        </select>

        <select type="select" id="exampleCustomSelect" name="category_id" class="custom-select  btn btn-outline-success mr-4">
                <option value="">Category</option>
                @foreach (App\Category::all() as $category )


                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
             </select>
    {{-- <button type="submit" class="btn btn-outline-info ml-1">search</button> --}}
<div class="text-center row ">
    <button class="ladda-button  btn-wide  btn btn-danger btn-shadow-danger" data-style="slide-down">
            <span class="ladda-label">Search
            </span>

             <span class="ladda-spinner">
            </span><div class="ladda-progress" style="width: 0px;"></div></button>
        </div>


        </form>

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
                        Title
            </div>
            <div class="fht-cell">
                </div>
            </th>
            <th style="" >
                <div class="th-inner sortable both">
                        Status
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
                <th style="" >

                        <div class="th-inner sortable both">
                                category


                    </div>

                    <div class="fht-cell">
                     </div>

                    </th>


                    <th style="" >

                            <div class="th-inner sortable both">
                                    Tag
                        </div>

                        <div class="fht-cell">
                         </div>

                        </th>
                        <th style="" >

                                <div class="th-inner sortable both">
                                        image
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


            @foreach($posts as $post)
            <?php
              $catpost= \App\Post::post($post->id);
              $postTags=\App\Post::postTags($post->id);
              $postids=\App\PostCategory::select('post_id')->get()->toArray();
              ?>
       <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title  }}</td>
            <td>{{ $post->status}}</td>
            <td>{{ $post->created_at->format('l, F d, Y')}}</td>
            <td>{{ $post->updated_at}}</td>
            <td>

                    @foreach($post->categories as $item)

                    {{$item->name}} <br>

                @endforeach
            </td>
            <td>
                @foreach($post->tags as $tag)

                {{$tag->name}} <br>

            @endforeach </td>
            <td> <img src="{{asset('storage/' . $post->image )}}" height="55" width="70" ></td>

            <td  class="text-center" >
                 <a  class="btn btn-primary" href="{{ route('admin.posts.edit', [ 'id' => $post->id ]) }}"> Edit</a>
            </td>
            <td  class="text-center">
                 <form method="post" action="{{ route('admin.posts.delete', [ 'id' => $post->id ]) }}" >
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

{{ $posts->links()}}

@endsection
