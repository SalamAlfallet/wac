
@extends('layouts.master')

@section('title' ,'Posts')


@section('content')
@foreach($posts as $post)

<div class="tr-section feed">
    <div class="tr-post">
     <div class="entry-header">
      <div class="entry-thumbnail">
       <a href="#"><img class="img-fluid" src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
      </div><!-- /entry-thumbnail -->
     </div><!-- /entry-header -->
     <div class="post-content">
      <div class="author-post">
       <a href="#"><img class="img-fluid rounded-circle" src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
      </div><!-- /author -->
      <div class="entry-meta">
       <ul>
        <li><a href="#">{{$post->title}}</a></li>
        <li>{{$post->created_at}}</li>
        <li><i class="fa fa-align-left"></i>&nbsp;{{$post->created_at}}</li>
        <li>
                @foreach($post->tags as $tag)

                {{$tag->name}}

                @if (!$loop->last)
					,
                    @endif
                    @endforeach

        </li>
       </ul>
      </div><!-- /.entry-meta -->
      <h2><a href="{{ route('posts.view', [ 'id' => $post->id ]) }}" class="entry-title">{{$post->title}}</a></h2>
      <p>{{$post->content}}</p>
      <div class="read-more">
       <div class="feed pull-left">

       </div><!-- /feed -->
       <div class="continue-reading pull-right">
        <a href="#">Continue Reading <i class="fa fa-angle-right"></i></a>
       </div><!-- /continue-reading -->
      </div><!-- /read-more -->
     </div><!-- /.post-content -->
    </div><!-- /.tr-post -->
   </div><!-- /.tr-post -->


@endforeach

{{$posts->links()}}
                            @endsection







