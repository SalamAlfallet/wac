@extends('layouts.web')


@section('style')
<style>
    .owl-item {
        height: 700px !important;


    }

    .fa-thumbs-up {
        color: blue;
    }
</style>
@endsection
@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('storage/' . $category->image)}}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white {{$category->color}} mb-3">{{$category->name}}</span>
                    <h1 class="mb-4"><a href="#">'{{$category->name}}' Category</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate mb-5">
            <div class="col-md-12 col-lg-8 main-content">

                @foreach($posts as $post)
                <div class="entry2 mb-5">
                    <a href="single.html"><img style="width:770px; height:513px" src="{{asset('storage/' . $post->image )}}" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-primary mb-3">{{$category->name}}</span>
                    <h2><a href="single.html">{{$post->title}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img style="width:32px; height:30px" src="{{asset('storage/' . $post->user->avater )}}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">{{$post->user->username}}</a></span>
                        <span>&nbsp;-&nbsp; {{$post->created_at->format('l, d, Y')}}&nbsp;-&nbsp; </span>
                        <div class="d-inline-block mt-2">

                            @foreach($post->tags as $tag)

                            {{$tag->name}}
                            @if (!$loop->last)
                            ,
                            @endif
                            @endforeach

                        </div>


                    </div>
                    <p>{{$post->content}}</p>
                </div>

                @endforeach


                <div class="row text-center pt-5 border-top">
                    <div class="col-md-12">

                        {{$posts->links()}}


                    </div>
                </div>



            </div>

            <div class="col-md-12 col-lg-4 sidebar">



                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>

                    <div class="post-entry-sidebar">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{asset('assets/images/img_1.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="sidebar-box">

                    @php

                    $cats=App\Category::all();
                    @endphp
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        @foreach($cats as $category)
                        <li><a href="#">{{$category->name}} <span>({{$category->posts->count()}})</span></a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-box">
                    @php

                    $tags=App\Tag::all();
                    @endphp
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach($tags as $tags)
                        <li><a href="#">{{$tags->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
    </div>



</section>
@endsection



@section('script')



<script>
    $(document).ready(function() {

        $(".likes").on("click", function() {

            // e.preventDefault();
            // alert('sss');
            var id = this.id;

            $.ajax({
                url: 'addlike/' + id,
                type: 'get',
                success: function(data) {
                    // alert(data);
                    if (data == 0) {
                        $(".likes").removeClass("fas fa-thumbs-up likes").addClass("far fa-thumbs-up likes");
                    } else {

                        $(".likes").removeClass("far fa-thumbs-up likes").addClass("fas fa-thumbs-up likes");

                    }
                    // $("#updatepeopleDiv").replaceWith(data);
                    //$('#updatepeople').modal('show');
                }
            });

        });
    });
</script>
@endsection
