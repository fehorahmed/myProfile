@extends('backend.layout.main')

@section('title', 'Service Control')
@section('content')

@section('main_status', 'active');
@section('service_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Add Service</small>
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
                        <h3 class="box-title">Service Add Section</h3>
                        <a href="{{ route('admin.service') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service">Service Name</label>
                                <input type="text" class="form-control" name="service" value="{{ old('service') }}"
                                    id="service" placeholder="Enter Your Service Name">
                            </div>
                            @error('service')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="details">Details </label>
                                <textarea name="details" class="form-control" id="details" cols="30" rows="10"
                                    placeholder="Enter Your Service Details.">{{ old('details') }}</textarea>
                            </div>
                            @error('details')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror



                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="file">Image File</label>
                                <input type="file" class="form-control" name="file" id="file">
                                <p class="help-block">Image Must be Width:100px and Height:100px.</p>
                            </div>
                            @error('file')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    Image Must be Width:100px and Height:100px. <br>
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
