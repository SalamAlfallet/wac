@extends('layouts.default2')

@section('titlepage')
<br>

Trashed Panel
@endsection
@section('content')





<table data-toggle="table"  data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover ">
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
                                        Deleted
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
                <td>  {{$post->id}} </td>
                <td>  {{$post->title}} </td>
                <td>  {{$post->status}} </td>
                <td>{{ $post->created_at}}</td>
                <td>{{ $post->deleted_at}}</td>
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

                    <td>
                            <form method="post" action="{{ route('admin.posts.restore', [ 'id' => $post->id ]) }}" >
                                 @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-primary"> restore </button>

                        </form>
                            </td>


                    <td  class="text-center">
                         <form method="post"  action="{{ route('admin.posts.forceDelete', [ 'id' => $post->id ]) }}" >
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

{{ $posts->links()}}


@endsection
