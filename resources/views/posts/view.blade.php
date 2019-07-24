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

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('assets/images/hero_1.jpg')}}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    @foreach($posts->categories as $cat)



                    <span class="post-category text-white bg-success mb-3">{{$cat->name}} <br></span>

                    <h1 class="mb-4"><a href="#">'{{$cat->name}}' Category

                            @if (!$loop->last)
                            ,
                            @endif
                        </a></h1>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">
        <div class="row blog-entries element-animate mb-5">
            <div class="col-md-12 col-lg-8 main-content">

                <div class="entry2 mb-5">

                    <a href="single.html"><img style="width:770px; height:513px" src="{{asset('storage/' . $posts->image )}}" alt="Image" class="img-fluid rounded"></a>
                    @foreach($posts->categories as $cat)
                    <span class="post-category text-white bg-primary mb-3">

                        {{$cat->name}} <br>
                    </span>
                    @endforeach
                    <h2><a href="single.html">{{$posts->title}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img style="width:32px; height:30px" src="{{asset('storage/' . $posts->user->avater )}}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">{{$posts->user->name}}</a></span>
                        <span>&nbsp;-&nbsp; {{$posts->created_at->format('l, d, Y')}}&nbsp;-&nbsp;</span>
                        <div class="d-inline-block mt-2">

                            @foreach($posts->tags as $tag)

                            {{$tag->name}}
                            @if (!$loop->last)
                            ,
                            @endif
                            @endforeach

                        </div>

                        <div class="fa fa-eye ml-3">{{$posts->stat->views}}</div>
                        <a class='control_like ml-3'> <i id="{{$posts->id}}" class="far fa-thumbs-up likes" style="font-size: 20px; "></i></a>
                    </div>
                    <p>{{$posts->content}}</p>
                </div>




                @php

                $comments= App\Post::get_comments_to_post($posts->id)->limit($data['countComments'])->get();;

                @endphp
                <div class="pt-5">
                    @if(count($comments)>1)
                    <h3 class="mb-5">{{count($comments)}} Comments</h3>


                    <ul class="comment-list">

                        @foreach($comments as $comment)

                        <li class="comment">
                            <div class="vcard">
                                <img src="{{asset('assets/images/user.jpg')}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$comment->name}}</h3>
                                <div class="meta">{{$comment->created_at}}</div>
                                <p>{{$comment->comment}}</p>

                            </div>
                        </li>

                        @endforeach

                    </ul>
                    @endif

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>

                        <form method="post" action="{{route('comment.store')}}" class="p-5 bg-light">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name')  }}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email')  }}">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" name="website" value="{{ old('website')  }}">
                                @error('website')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="comment" cols="30" rows="10" class="form-control">
                                {{ old('comment')  }}

                                </textarea>
                                @error('comment')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4 sidebar">



                <div class="sidebar-box">
                    <h3 class="heading">Related Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>

                            @foreach ($posts->relatedPosts() as $related )

                            <li>
                                <a href="#">
                                    <img style="width:90px; height:68px" src="{{asset('storage/'. $related->image)}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>{{$related->title}}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{$related->created_at->format('l, d, Y')}}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{$posts->relatedPosts()->links()}}
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
