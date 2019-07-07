@extends('layouts.default2')


@section('content')


<div class="mb-3 card">
        <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                Portfolio Performance
            </div>

        </div>
        <div class="no-gutters row">
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                        <i class="fa fa-window-maximize text-white opacity-8"></i></div>
                    <div class="widget-chart-content">
                        <div class="widget-subheading">Total Posts</div>
                        <div class="widget-numbers">{{ $Post->total()}}</div>
                        <div class="widget-description opacity-8 text-focus">

                        </div>
                    </div>
                </div>
                <div class="divider m-0 d-md-none d-sm-block"></div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                        <i class="fa fa-bookmark text-dark"></i></div>
                    <div class="widget-chart-content">
                        <div class="widget-subheading">Total Categories</div>
                        <div class="widget-numbers"><span>{{ $Category->total()}}</span></div>

                    </div>
                </div>
                <div class="divider m-0 d-md-none d-sm-block"></div>
            </div>
            <div class="col-sm-12 col-md-4 col-xl-4">
                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                        <i class=" fa fa-tags text-white"></i></div>
                    <div class="widget-chart-content">
                        <div class="widget-subheading">Total Tags</div>
                        <div class="widget-numbers text-success"><span>{{ $Tag->total()}}</span></div>

                    </div>
                </div>
            </div>

    </div>

</div>



 @endsection
