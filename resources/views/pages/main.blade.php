@extends('layouts.admin_layout')
@section('page_title','Main')
@section('main_select','active')
@section('content')
<main>
    <div class="container-fluid px-4">
        @if (session()->has('success'))
        <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @if (session()->has('error'))
        <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
        <div class="row">
            <div class="col-md-8 offset-2 card p-4">
                <form action="{{url('admin/main/'.$main->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" value="{{$main->title}}" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                      <label for="sub_title">Sub Title</label>
                      <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{$main->sub_title}}" placeholder="Enter sub title">
                    </div>
                    <div class="form-group">
                        <label for="resume">Upload Resume</label>
                        <input type="file" name="resume" class="form-control" id="resume">
                        <br>
                        <a href="{{asset('uploads/main/'.$main->resume)}}" class="btn btn-success" download>Download Resume</a>
                    </div>
                    <div class="form-group">
                        <br>
                        <img width="100%" height="300px" src="{{asset('uploads/main/'.$main->bg_image)}}" class="img rounded" alt="">
                        <br>
                        <label for="bg_image">Background Image</label>
                        <input type="file" name="bg_image" class="form-control" id="bg_image">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
        <br><br><br>
    </div>
</main>
@endsection