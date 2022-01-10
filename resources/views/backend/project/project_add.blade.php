@extends('backend.layout.main')

@section('title', 'Project Control')
@section('content')

@section('main_status', 'active');
@section('project_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Add Project</small>
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
                        <h3 class="box-title">Project Add Section</h3>
                        <a href="{{ route('admin.project') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="name" placeholder="Enter Your Project Name">
                            </div>
                            @error('name')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="about">About Project </label>
                                <textarea name="about" class="form-control" id="about" cols="30" rows="10"
                                    placeholder="Enter Your Project About.">{{ old('about') }}</textarea>
                            </div>
                            @error('about')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror



                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Group Name</label>
                                <select name="group_name" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="" selected="selected">Select One</option>
                                    <option>brand</option>
                                    <option>manipul</option>
                                    <option>creative</option>
                                    <option>design</option>
                                </select>
                            </div>
                            @error('group_name')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="link">Project Link</label>
                                <input type="text" class="form-control" name="link" value="{{ old('link') }}"
                                    id="link" placeholder="Enter Your Project Link">
                                    <p class="help-block">Link like: https://www.fehor.laundry.idbdev.com/</p>
                            </div>
                            @error('link')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="file">Image File</label>
                                <input type="file" class="form-control" name="file" id="file">
                                <p class="help-block">Image Must be Width:100px and Height:100px.</p>

                            </div>
                            @error('file')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    Image Must be Width:340px and Height:340px. <br>
                                    {{ $message }}
                                </div>
                            @enderror



                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>

    </section><!-- /.content -->
</div>
@endsection
