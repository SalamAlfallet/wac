
@extends('layouts.master')

@section('title' ,'Posts')


@section('content')


<div class="col-lg-12">
        <div class="row">
                @foreach($posts as $cat)
                @foreach($cat->posts as $post)
       <div class="col-sm-6">
        <div class="tr-section">
         <div class="tr-post">
          <div class="entry-header">
           <div class="entry-thumbnail">
            <a href="#"><img class="img-fluid"  src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
           </div><!-- /entry-thumbnail -->
          </div><!-- /entry-header -->
          <div class="post-content">
           <div class="author-post">
            <a href="#"><img class="img-fluid rounded-circle"  src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
           </div><!-- /author -->
           <div class="entry-meta">
            <ul>
                    <li><a href="#">{{$post->title}}</a></li>
                    <li>{{$post->created_at}}</li>
                    <li><i class="fa fa-align-left"></i>&nbsp;{{$post->created_at}}</li>
            </ul>
           </div><!-- /.entry-meta -->
           <h2><a href="#" class="entry-title">{{$post->title}}</a></h2>
           <p>{{$post->content}}</p>
           <div class="read-more">
            <div class="feed pull-left">
             <ul>

             <li><i class="fa fa-heart-o"></i>{{$post->stat->views}}</li>
             </ul>
            </div><!-- /feed -->
            <div class="continue-reading pull-right">
             <a href="#">Continue Reading <i class="fa fa-angle-right"></i></a>
            </div><!-- /continue-reading -->
           </div><!-- /read-more -->
          </div><!-- /.post-content -->
         </div><!-- /.tr-post -->
        </div><!-- /.tr-post -->
       </div><!-- /col-sm-6 -->



       @endforeach
       @endforeach

         </div><!-- /.row -->
        </div>



{{-- {{$posts->links()}} --}}
                            @endsection







