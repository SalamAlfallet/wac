@extends('layouts.web')


@section('style')
<style>
    .owl-item {
        height: 700px !important;


    }
</style>
@endsection


@section('slider_item')

<div class="slide-one-item home-slider owl-carousel">


    @foreach($posts as $item)

    <div class="site-cover site-cover-sm same-height overlay" style=" background: url('{{asset('storage/' . $item->image )}}?size=1349,700'); background-size:cover; height:700px; ">
        <div class="container">
            <div class="row same-height align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="post-entry">
                        @foreach($item->categories as $category)
                        <span class="post-category text-white {{$category->color}} mb-3">{{$category->name}}</span>
                        @endforeach
                        <h2 class="mb-4"><a href="#">{{$item->title}}</a></h2>
                        <div class="post-meta align-items-center text-left">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('storage/' . $item->user->avater )}}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">{{$item->user->name}}</span>
                            <span>&nbsp;-&nbsp; {{$item->content}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>


<!-- <div class="slide-one-item home-slider owl-carousel owl-loaded owl-drag">


    <div class="owl-stage-outer">
        <div class="owl-stage" style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 8094px;">
            <div class="owl-item active" style="width: 1349px;">
                <div class="site-cover site-cover-sm same-height overlay" style="background-image: url('{{asset('assets/images/img_1.jpg')}}');">
                    <div class="container">
                        <div class="row same-height align-items-center">
                            <div class="col-md-12 col-lg-6">
                                <div class="post-entry">
                                    <span class="post-category text-white bg-success mb-3">Nature</span>
                                    <h2 class="mb-4"><a href="#">The 20 Biggest Fintech Companies In America 2019</a></h2>
                                    <div class="post-meta align-items-center text-left">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By Carrol Atkinson</span>
                                        <span>&nbsp;-&nbsp; February 10, 2019</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="owl-nav">
        <div class="owl-prev"><span class="icon-keyboard_arrow_left"></span></div>
        <div class="owl-next"><span class="icon-keyboard_arrow_right"></span></div>
    </div>
    <div class="owl-dots">
        <div class="owl-dot active"><span></span></div>
        <div class="owl-dot"><span></span></div>
    </div>
</div> -->

@endsection


@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rounded border p-4">
                    <div class="row align-items-stretch">
                        @foreach($posts as $post)

                        <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                            <a href="{{ route('posts.view', [ 'id' => $post->id ]) }}" class="d-flex post-sm-entry">
                                <figure class="mr-3 mb-0"><img src="{{asset('storage/' . $post->image )}}"  style="width:110xp; height:85px;" alt="Image" class="rounded"></figure>
                                <div>
                                    @foreach($post->categories as $cat)




                                    <span class="post-category  {{$cat->color}} text-white m-0 mb-2">

                                        {{$cat->name}}

                                        @if (!$loop->last)

                                        @endif



                                    </span>
                                    @endforeach
                                    <h2 class="mb-0">{{$post->title}}</h2>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            <div class="col-md-5">
                <a href="{{ route('posts.view', [ 'id' => $posts1->id ]) }}" class="hentry img-1 h-100 gradient" style="background-image: url({{asset('storage/' . $posts1->image)}});">
                    @foreach($posts1->categories as $cat)
                    <span class="post-category text-white {{$cat->color}}">{{$cat->name}}</span>
                    @endforeach
                    <div class="text">
                        <h2>{{$posts1->title}}</h2>
                        <span>{{$posts1->created_at}}</span>
                    </div>
                </a>
            </div>
            <div class="col-md-7">
                <a href="{{ route('posts.view', [ 'id' => $posts2->id ]) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url({{asset('storage/' . $posts2->image)}});">
                    @foreach($posts2->categories as $cat)
                    <span class="post-category text-white {{$cat->color}}">{{$cat->name}}</span>
                    @endforeach
                    <div class="text text-sm">
                        <h2>{{$posts2->title}}</h2>
                        <span>{{$posts2->created_at}}</span>
                    </div>
                </a>
                <div class="two-col d-block d-md-flex">


                    @foreach ($postsall as $postsalls )


                    <a href="{{ route('posts.view', [ 'id' => $postsalls->id ]) }}" class="hentry v-height mr-4 img-2 gradient" style="background-image:  url({{asset('storage/' . $postsalls->image)}});">
                    @foreach ($postsalls->categories as $catpost)
                    <span class="post-category text-white {{$catpost->color}}">{{$catpost->name}}</span>
@endforeach
                    <div class="text text-sm">
                            <h2>{{$postsalls->title}}</h2>
                            <span>{{$postsalls->created_at}}</span>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 section-heading">
                <h2>Popular Posts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="entry2">
                    <a href="{{ route('posts.view', [ 'id' => $mostViewFirst->id ]) }}"><img src="{{asset('storage/' . $mostViewFirst->image)}}" alt="Image" class="img-fluid rounded"></a>

                    @php
                    $categories=App\Post::postcatid($mostViewFirst->id);

                    @endphp
                    @foreach($categories as $category)


                    <span class="post-category text-white {{$category->color}} mb-3">{{$category->name}}



                    </span>
                    @endforeach
                    <h2><a href="{{ route('posts.view', [ 'id' => $mostViewFirst->id ]) }}">{{$mostViewFirst->title}}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('storage/' . $mostViewFirst->image)}}" alt="Image" class="img-fluid"></figure>

                        <span>&nbsp;-&nbsp; {{$mostViewFirst->created_at}}</span>
                    </div>
                    <p>{{$mostViewFirst->content}}</p>
                </div>
            </div>
            <div class="col-lg-6 pl-lg-4">

                @foreach($mostview as $mostviews)
                <div class="entry3 d-block d-sm-flex">
                    <figure class="figure order-2"><a href="{{ route('posts.view', [ 'id' => $mostviews->id ]) }}"><img style="width:150px ; height:115px" src="{{asset('storage/' . $mostviews->image)}}" alt="Image" class="img-fluid rounded"></a></figure>
                    <div class="text mr-4 order-1">
                        @php
                        $cats=App\Post::postcatid($mostviews->id);

                        @endphp
                        @foreach($cats as $category)

                        <span class="post-category text-white {{$category->color}} mb-3">{{$category->name}}


                        </span>
                        @endforeach
                        <h2><a href="{{ route('posts.view', [ 'id' => $mostviews->id ]) }}">{{$mostviews->title}}</a></h2>
                        <span class="post-meta mb-3 d-block">{{$mostviews->created_at}}</span>
                        <p style="width:400px">{{$mostviews->content}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
 @php
 $catslatest=App\Category::latest()->limit(3)->get();

 @endphp
            @foreach($catslatest as $cat)

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="section-heading mb-5 d-flex align-items-center">

                    <h2>{{$cat->name}}</h2>
                    <!-- <div class="ml-auto"><a href="#" class="view-all-btn">View All</a></div> -->
                </div>
                @php

                $postCat=App\Category::get_posts_by_categoryId($cat->id)->limit($data['countPosts'])->get();;

                @endphp

                @foreach($postCat as $postscat)
                <div class="entry2 mb-5">
                    <a href="{{ route('posts.view', [ 'id' => $postscat->id ]) }}"><img style="width:370px; height:247px" src="{{asset('storage/' . $postscat->image)}}" alt="Image" class="img-fluid rounded"></a>
                    <span  class="post-category text-white {{$postscat->color}} mb-3 ">{{$postscat->name}}</span>
                    <h2 style="height:60px;"><a href="single.html">{{$postscat->title}}</a></h2>
                    <div  class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('storage/' . $postscat->image)}}" alt="Image" class="img-fluid"></figure>
                      
                        <span >&nbsp;-&nbsp; {{$postscat->created_at}}</span>
                    </div>
                    <p style="height:95px;">{{$postscat->content}}</p>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
