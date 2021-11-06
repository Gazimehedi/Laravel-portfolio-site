@extends('layouts.admin_layout')
@section('page_title','About')
@section('about_select','active')
@section('about_form_select','show')
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
        <h1 class="mt-4 mb-4">About <a class="btn btn-primary btn-sm"href="{{url('admin/about/create')}}">Create new</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">About</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </div>
</main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title #1</th>
                        <th scope="col">Title #2</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($abouts as $about)
                            <tr>
                                <th scope="row">{{$about->id}}</th>
                                <td><img width="80px" src="{{asset('uploads/about/'.$about->image)}}"></td>
                                <td>{{$about->title1}}</td>
                                <td>{{$about->title2}}</td>
                                <td>{{Str::words($about->description,$words = 5, $end='...')}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/about/edit/'.$about->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{url('admin/about/delete/'.$about->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection