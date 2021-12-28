
@extends('backend.layout.main')

@section('title','Banner Control')
@section('content')

@section('banner_status','active');

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
              <h3 class="box-title">Responsive Hover Table</h3>
              <button class="btn btn-primary">Add New</button>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>

              </tbody></table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>

  </section><!-- /.content -->
</div>
@endsection
