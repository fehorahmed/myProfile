@extends('backend.layout.main')

@section('title', 'Education Control')
@section('content')

@section('main_status', 'active');
@section('education_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Add Education</small>
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
                        <h3 class="box-title">Education Add Section</h3>
                        <a href="{{ route('admin.education') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{ route('admin.education.store') }}" method="POST" enctype="multipart/form-data"
                    role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exam">Exam Name</label>
                                <input type="text" value="{{ old('exam') }}" class="form-control"
                                    name="exam" id="exam" placeholder="Enter Exam Name" required>

                            </div>
                            @error('exam')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="college">College Name</label>
                                <input type="text" value="{{ old('college') }}" class="form-control"
                                    name="college" id="college" placeholder="Enter College Name." required>
                            </div>
                            @error('college')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="result">Result</label>
                                <input type="text" value="{{ old('result') }}" name="result" class="form-control"
                                    id="result" placeholder="Enter Result. " required>
                            </div>
                            @error('result')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" value="{{ old('start_date') }}" name="start_date"
                                    class="form-control" id="start_date" placeholder="Enter Start Date" required>

                            </div>
                            @error('start_date')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}"
                                    id="end_date" placeholder="Enter End Date">
                            </div>
                            @error('end_date')
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
