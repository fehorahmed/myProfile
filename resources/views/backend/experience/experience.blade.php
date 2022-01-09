@extends('backend.layout.main')

@section('title', 'Experience Control')
@section('content')

@section('main_status', 'active');
@section('experience_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Control panel</small>
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

                        @if (session('message'))

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">×</button>
                                <h4> <i class="icon fa fa-check"></i> Here!</h4>
                                {{ session('message') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.experience.add') }}"><button class="btn btn-primary center-block">Add
                                New</button></a>
                        <div class="box-tools">

                            <div class="input-group" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control input-sm pull-right"
                                    placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Designation</th>
                                    <th>Company Address</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($data as $datas)
                                    <tr>
                                        <td>{{ $datas->id }}</td>
                                        <td>{{ $datas->company_name }}</td>
                                        <td>{{ $datas->designation }}</td>
                                        <td>{{ $datas->address }}</td>
                                        <td>{{ $datas->start_date }}</td>
                                        <td>{{ $datas->end_date }}</td>

                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.experience.edit', ['id' => $datas->id]) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('admin.experience.destroy', ['id' => $datas->id]) }}">Delete</a>
                                            @if ($datas->status == 1)
                                                <span class="label label-info">This is Active</span>
                                            @else
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.experience.active', ['id' => $datas->id]) }}">Active</a>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</div>
@endsection
