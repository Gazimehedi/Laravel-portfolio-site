@extends('layouts.admin_layout')
@section('page_title','Portfolio')
@section('portfolio_select','active')
@section('portfolio_form_select','show')
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
        <h1 class="mt-4 mb-4">Portfolio <a class="btn btn-primary btn-sm"href="{{url('admin/portfolio/create')}}">Create new</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolio</li>
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
                        <th scope="col">Name</th>
                        <th scope="col">Client</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sub Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($portfolios as $portfolio)
                            <tr>
                                <th scope="row">{{$portfolio->id}}</th>
                                <td><img width="80px" src="{{asset('uploads/portfolio/'.$portfolio->image)}}"></td>
                                <td>{{$portfolio->name}}</td>
                                <td>{{$portfolio->client}}</td>
                                <td>{{$portfolio->category}}</td>
                                <td>{{Str::words($portfolio->sub_title,$words = 5, $end='...')}}</td>
                                <td>{{Str::words($portfolio->description,$words = 5, $end='...')}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/portfolio/edit/'.$portfolio->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{url('admin/portfolio/delete/'.$portfolio->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection