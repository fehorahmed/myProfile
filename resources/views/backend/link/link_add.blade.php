@extends('backend.layout.main')

@section('title', 'Social Link Control')
@section('content')

@section('link_status', 'active');
@section('link_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Add Social Link</small>
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
                        <h3 class="box-title">Social Link Add Section</h3>
                        <a href="{{ route('admin.link') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{ route('admin.link.store') }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Site Name</label>
                                    <select name="name" class="form-control" id="name">
                                        <option value="{{old('name')}}">{{old('name')}}</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="linkedin">LinkedIn</option>
                                    </select>
                            </div>
                            @error('name')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="link">Your URL</label>
                                <input type="text" value="{{ old('link') }}" class="form-control"
                                    name="link" id="link" placeholder="Enter Your Link.">
                                    <p>Like: https://www.facebook.com/</p>
                            </div>
                            @error('link')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
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
