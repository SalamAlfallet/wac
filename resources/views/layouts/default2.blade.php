<!doctype html>
<html lang="en">


<!-- Mirrored from kero.architectui.com/demo/kero-html-sidebar-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2019 17:34:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport">
    <title>@yield('title','Blog Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">


    @yield('style')

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('assets/main.07a59de7b920cd76b874.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-gray">
        <div class="app-main">
            <div class="app-sidebar-wrapper">

                <div class="app-sidebar bg-night-sky sidebar-text-light">
                    <div class="app-header__logo ">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                    <div class="scrollbar-sidebar scrollbar-container">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                                <li class="mm-active">
                                    <a href="{{route('statistac')}}">
                                        <i class="metismenu-icon fa fa-home"></i>
                                        Dashboards
                                    </a>

                                </li>
                                <li>
                              
                                    <a href="{{route('admin.notifications')}}">
                                        <i class="metismenu-icon fas fa-bell"></i>
                                       Notifications Panel
                                    </a>

                                </li>

                                <li>
                                    <a href="{{route('downloads')}}">
                                        <i class="metismenu-icon fa fa-download"></i>
                                        Downloads Panel
                                    </a>

                                </li>
                                <li>
                                    <a>
                                        <i class="metismenu-icon fa fa-window-maximize"></i>
                                        Posts Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>


                                    <ul>

                                        <li>
                                            <a href="{{route('admin.posts')}}">
                                                <i class="metismenu-icon"></i>
                                                Posts
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.posts.create')}}">
                                                <i class="metismenu-icon"></i>
                                                Create Post
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.posts.trashed')}}">
                                                <i class="metismenu-icon">
                                                </i>Trashed
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                <li>
                                    <a>
                                        <i class="metismenu-icon fa fa-bookmark"></i>
                                        Category Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>
                                    <ul>

                                        <li>
                                            <a href="{{route('admin.category')}}">
                                                <i class="metismenu-icon">
                                                </i>Categoreis
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.category.create')}}">
                                                <i class="metismenu-icon">
                                                </i>Create Category
                                            </a>
                                        </li>




                                    </ul>
                                </li>

                                <li>
                                    <a>
                                        <i class="metismenu-icon fa fa-tags"></i>
                                        Tags Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>
                                    <ul>

                                        <li>
                                            <a href="{{route('admin.tag')}}">
                                                <i class="metismenu-icon">
                                                </i>Tags
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.tag.create')}}">
                                                <i class="metismenu-icon">
                                                </i>Create Tag
                                            </a>
                                        </li>






                                    </ul>
                                </li>

                                <li>
                                    <a>

                                        <i class="metismenu-icon fas fa-users-cog"></i>
                                        users Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>


                                    <ul>

                                        <li>
                                            <a href="{{route('admin.users')}}">
                                                <i class="metismenu-icon"></i>
                                                Users
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.users.create')}}">
                                                <i class="metismenu-icon"></i>
                                                Creat users
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.users.roles')}}">
                                                <i class="metismenu-icon"></i>
                                                Creat Role
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.users.permission')}}">
                                                <i class="metismenu-icon"></i>
                                                Creat Permission
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{route('admin.users.permissionRole')}}">
                                                <i class="metismenu-icon"></i>
                                                Role Permissions
                                            </a>
                                        </li>


                                    </ul>
                                </li>



                                <li>
                                    <a>

                                        <i class="metismenu-icon fas fa-comments"></i>
                                        Comments Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>


                                    <ul>

                                        <li>
                                            <a href="{{route('admin.comments')}}">
                                                <i class="metismenu-icon"></i>
                                                Comments
                                            </a>
                                        </li>




                                    </ul>
                                </li>



                                <li>
                                    <a>

                                        <i class="metismenu-icon fas fa-cog"></i>
                                       Settings Panel
                                        <i class="metismenu-state-icon fa fa-sort-down caret-left"></i>
                                    </a>


                                    <ul>

                                        <li>
                                            <a href="{{route('admin.web.setting')}}">
                                                <i class="metismenu-icon"></i>
                                                setting
                                            </a>
                                        </li>




                                    </ul>
                                </li>


                            </div>
                    </div>
                </div>
            </div>
            <div class="app-sidebar-overlay d-none animated fadeIn"></div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">
                        <div class="page-title-heading">
                            @yield('titlepage')
                        </div>
                        <div class="app-header-right">
                            <div class="search-wrapper">
                                <i class="fa fa-search-minus"></i>
                                <input type="text" placeholder="Search...">
                            </div>
                            <div>
                                | {{Auth::user()->name}}
                            </div>
                            <div class="header-btn-lg pr-0">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="btn-group">
                                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                    <img width="42" class="rounded" src="{{asset('storage/' . Auth::user()->avater )}}" alt="">
                                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>

                                                </a>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                                    <div class="dropdown-menu-header">
                                                        <div class="dropdown-menu-header-inner bg-info">
                                                            <div class="menu-header-image opacity-2" style="background-image: url({{asset('assets/images/dropdown-header/city1.jpg')}});"></div>
                                                            <div class="menu-header-content text-left">
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <img width="42" class="rounded-circle" src="{{asset('storage/' . Auth::user()->avater )}}" alt="">
                                                                        </div>
                                                                        <div class="widget-content-left">
                                                                            <div class="widget-heading">{{Auth::user()->name}}
                                                                            </div>
                                                                            <div class="widget-subheading opacity-8">A short profile description
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-right mr-2">
                                                                            <a class="btn-pill btn-shadow btn-shine btn btn-focus" href="{{route('admin.logout')}}"> Logout</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="app-header-overlay d-none animated fadeIn"></div>
                    </div>
                    <div class="app-inner-layout app-inner-layout-page">


                        <div class="app-inner-layout__content">
                            <div class="tab-content">
                                <div class="container-fluid">


                                    @yield('content')


















                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>



    </div>
    </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/scripts/main.07a59de7b920cd76b874.js')}}"></script>



</body>

<!-- Mirrored from kero.architectui.com/demo/kero-html-sidebar-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Jun 2019 17:34:18 GMT -->

</html>
