
@extends('backend.layout.main')

@section('banner_status','active');
@section('title','Banner Control')
@section('content')


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

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->





    </div><!-- /.row (main row) -->

  </section><!-- /.content -->
</div>
@endsection
