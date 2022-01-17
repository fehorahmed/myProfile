@extends('backend.layout.main')

@section('title', 'About Control')
@section('content')


@section('main_status', 'active');
@section('about_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Edit Aboutr</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> @yield('title')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">About Edit Section</h3>
                        <a href="{{ route('admin.about') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="about">About Yourself</label>
                                <textarea name="about" class="form-control" id="about" cols="30" rows="5"
                                    placeholder="Enter about yourself" required>{{ old('about',$data->about) }}</textarea>

                            </div>
                            @error('about')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Donation in a Number</label>
                                <input type="number" value="{{ old('donation',$data->donation) }}" class="form-control"
                                    name="donation" id="donation" placeholder="Enter donation in number" required>
                            </div>
                            @error('donation')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="project">Project in a Number</label>
                                <input type="number" value="{{ old('project',$data->project) }}" name="project" class="form-control"
                                    id="project" placeholder="Enter project in a Number" required>
                            </div>
                            @error('project')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="volunteers">Enter Volunteers in a Number</label>
                                <input type="number" value="{{ old('volunteers',$data->volunteers) }}" name="volunteers"
                                    class="form-control" id="volunteers" placeholder="Enter volunteers in a Number" required>

                            </div>
                            @error('volunteers')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="web_design">Web Design skrill in %</label>
                                <input type="number" class="form-control" name="web_design"
                                    value="{{ old('web_design',$data->web_design) }}" id="web_design"
                                    placeholder="Enter Your Web Design Skrill in %" required>
                            </div>
                            @error('web_design')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="web_development">Web Development skrill in %</label>
                                <input type="number" class="form-control" name="web_development"
                                    value="{{ old('web_development',$data->web_development) }}" id="web_development"
                                    placeholder="Enter Your Web Development Skrill in %" required>
                            </div>
                            @error('web_development')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="laravel">Laravel Skrill in %</label>
                                <input type="number" name="laravel" value="{{ old('laravel',$data->laravel) }}" class="form-control"
                                    placeholder="Enter Wordpress skrill in %" id="laravel" required>
                            </div>
                            @error('laravel')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="wordpress">Wordpress Skrill in %</label>
                                <input type="number" value="{{ old('wordpress',$data->wordpress) }}" name="wordpress" id="wordpress"
                                    class="form-control" placeholder="Enter Wordpress skrill in %" required>
                            </div>
                            @error('wordpress')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="wordpress">Photoshop Skrill in %</label>
                                <input type="number" value="{{ old('photoshop',$data->photoshop) }}" name="photoshop" id="photoshop"
                                    class="form-control" placeholder="Enter Photoshop skrill in %" required>
                            </div>
                            @error('photoshop')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </section><!-- /.content -->
</div>
@endsection
