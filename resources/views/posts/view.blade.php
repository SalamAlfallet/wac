@extends('layouts.master')

@section('title' ,$posts->title)
<!--
@component('components.alert')
@slot('type', 'danger')




	<h2>Error</h2>
	<p>You have some errors!</p>
@endcomponent -->


@section('style')
<style>
header.masthead {
    margin-bottom: 50px;
    background: linear-gradient(rgba(34, 34, 34, 0.7), rgba(34, 34, 34, 0.7)), url({{asset('storage/' . $posts->image)}}) no-repeat center center;
    background-color: #777777;
    background-attachment: scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>

@endsection
@section('content')
<header class="masthead" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>{{$posts->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <article>
            <div class="container">
             <div class="row">
              <div class="col-lg-10 offset-md-1">
              <div class="white-blogpage">

               <div class="row post-top-sec">
                <div class="col-lg-3">
                 <h5> Posted </h5>
                 <p>{{$posts->created_at}}</p>
                </div><!-- /.col-lg-3 -->

                <div class="col-lg-3">
		   <h5> Like(s) </h5>
		   <p><i class="fa fa-heart-o"></i>{{$posts->stat->views}}</p>
		  </div>







                <div class="col-lg-12">
                 <hr class="small-hr">
                </div> <!-- /.col-lg-12 -->
               </div><!-- /.row -->


              <p>{{$posts->content}}</p>
              <blockquote>
                    {{$posts->content}}
                </blockquote>


              </div><!-- /.col-lg-8 -->
              </div>
             </div>
            </div>
           </article>



<!-- <h1>{{ $posts['title'] }}</h1>
<p> {{ $posts['content'] }} </p> -->
@endsection




