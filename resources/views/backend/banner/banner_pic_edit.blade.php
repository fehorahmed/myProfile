@extends('backend.layout.main')

@section('title', 'Banner Control')
@section('content')

@section('main_status', 'active');
@section('banner_status', 'active');

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Edit Banner</small>
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
                        <h3 class="box-title">Banner Edit Section</h3>
                        <a href="{{ route('admin.banner') }}"><button
                                class="btn btn-primary pull-right">Back</button></a>

                    </div><!-- /.box-header -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">

            <div class="box box-primary">


                <!-- form start -->
                <form action="{{route('admin.banner.update')}}" method="POST" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name', $data->name)}}" id="name" placeholder="Enter Your Name">
                            </div>
                            @error('name')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" value="{{old('email', $data->email)}}" class="form-control" name="email"  id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            @error('email')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="number" value="{{old('phone',$data->phone)}}" name="phone" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Phone Number">
                            </div>
                            @error('phone')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <label for="address">Enter Address</label>
                                <textarea name="address" class="form-control" id="address" cols="30" rows="5"
                                    placeholder="Enter Address">{{old('address',$data->address)}}</textarea>
                            </div>
                            @error('address')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{old('designation',$data->designation)}}" id="designation"
                                    placeholder="Enter Your Designation">
                            </div>
                            @error('designation')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <label for="details">Details Paragraph</label>
                                <textarea name="details" class="form-control" id="details" cols="30" rows="5"
                                    placeholder="Enter details paragraph">{{old('details',$data->details)}}</textarea>
                            </div>
                            @error('details')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <label for="date">Date of Birth</label>
                                <input type="date" name="date" value="{{old('date',$data->date)}}" class="form-control" id="date">
                            </div>
                            @error('date')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{$message}}
                              </div>
                            @enderror
                            <div class="form-group">
                                <img src="{{ asset('profilePic/'.$data->pic_name) }}" width="80" alt="">
                                <br>
                                <label for="exampleInputFile">Image File</label>
                                <input type="file" name="file" id="exampleInputFile">
                                <p class="help-block">Image Must be Width:668px and Height:690px.</p>
                            </div>
                            @error('file')
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Image Must be Width:668px and Height:690px. <br>
                                {{$message}}
                              </div>
                            @enderror



                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </section><!-- /.content -->
</div>
@endsection
