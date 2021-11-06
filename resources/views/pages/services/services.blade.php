@extends('layouts.admin_layout')
@section('page_title','Services')
@section('services_select','active')
@section('services_form_select','show')
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
        <h1 class="mt-4 mb-4">Services <a class="btn btn-primary btn-sm"href="{{url('admin/services/create')}}">Create new</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Services</li>
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
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{$service->id}}</th>
                                <td>{{$service->title}}</td>
                                <td>{{Str::words($service->description,$words = 10, $end='...')}}</td>
                                <td><i class="{{$service->icon}}"></i></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/services/edit/'.$service->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{url('admin/services/delete/'.$service->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection