
@extends('layouts.master')

@section('title' ,'Posts')


@section('content')
@section('style')
<style>

.entry-title{



    color: #1ab394 !important;

    font-size: 20px;


}
}

</style>
@endsection


<div class="col-md-3">
        <h2 class="ml-3">Most View</h2>
@foreach ( $mostview as $view)


        <div class="card widget-info-one">
         <div class="widget-avatar-img">
         <img class="card-img-top img-fluid" src="{{asset('storage/' . $view->image )}}" alt="">
        </div><!-- /.avatar-img -->
           <div class="card-block">
        <div class="inner">
         <div class="widget-avatar pull-left"><img alt="" src="{{asset('storage/' . $view->image )}}"></div>
          <h5>{{$view->title}}</h5>
          <span class="subtitle">{{$view->content}}</span>
         </div><!-- /.inner -->
         </div>

        </div><!-- /.panel -->
        @endforeach



       </div><!-- /.col-md-4 -->

       <div class="col-md-6">


@foreach($posts as $post)

<div class="tr-section feed">
    <div class="tr-post">
     <div class="entry-header">
      <div class="entry-thumbnail">
       <a href="{{ route('posts.view', [ 'id' => $post->id ]) }}"><img class="img-fluid" src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
      </div><!-- /entry-thumbnail -->
     </div><!-- /entry-header -->
     <div class="post-content">
      <div class="author-post">
       <a href="{{ route('posts.view', [ 'id' => $post->id ]) }}"><img class="img-fluid rounded-circle" src="{{asset('storage/' . $post->image )}}" alt="Image"></a>
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

        <li>
                @foreach($post->categories as $cat)

                {{$cat->name}}

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
        <a href="{{ route('posts.view', [ 'id' => $post->id ]) }}" >Continue Reading <i class="fa fa-angle-right"></i></a>
       </div><!-- /continue-reading -->
      </div><!-- /read-more -->
     </div><!-- /.post-content -->
    </div><!-- /.tr-post -->
   </div><!-- /.tr-post -->


@endforeach
       </div>

       <div class="col-md-3">
            <h1 class="entry-title ml-4">Category</h1>
            <div class="card widget-info-two">

                    <ul class="list-group list-group-flush">
                          @foreach (App\Category::all() as $category )
                      <li class="list-group-item"><i class="fa fa-bookmark"></i>&nbsp;


                          <a   href="{{ route('postsOfcategory', [ 'id' => $category->id ]) }}">   {{$category->name}}</a>
                        </li>

                           @endforeach

                    </ul>
      </div>


      <h1 class="entry-title ml-4">Tags</h1>
      <div class="card widget-info-two">

              <ul class="list-group list-group-flush">
                    @foreach (App\Tag::all() as $tags )
                <li class="list-group-item"><i class="fa fa-tags"></i>&nbsp;


                    <a   href="#">   {{$tags->name}}</a>
                  </li>

                     @endforeach

              </ul>
</div>








         </div>


{{$posts->links()}}


                            @endsection







