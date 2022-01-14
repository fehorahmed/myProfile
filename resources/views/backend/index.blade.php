@extends('backend.layout.main')

@section('title', 'Dashboard')
@section('content')

@section('dashboard_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <a href="{{route('admin.message')}}">  <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Viewer Messages</span>
                        <span class="info-box-number">{{$viewer_message_count}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <a href="{{route('admin.service')}}">  <span class="info-box-icon bg-yellow"> <i class="fa fa-fw fa-truck"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Services</span>
                        <span class="info-box-number">{{$service_count}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <a href="{{route('admin.project')}}">  <span class="info-box-icon bg-yellow"> <i class="fa fa-fw fa-file-o"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Project</span>
                        <span class="info-box-number">{{$project_count}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <a href="{{route('admin.experience')}}">  <span class="info-box-icon bg-yellow"> <i class="fa fa-fw fa-shirtsinbulk"></i></span></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Experience</span>
                        <span class="info-box-number">{{$experience_count}}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->





        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div>
@endsection
