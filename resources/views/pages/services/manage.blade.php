@extends('layouts.admin_layout')
@section('page_title','Services')
@section('services_select','active')
@section('services_form_select','show')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Services</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Services</li>
            <li class="breadcrumb-item active">Manage</li>
        </ol>
        <div class="row">
            <div class="col-md-8 offset-2 card p-4">
                <form action="{{url('admin/services/manage_proccess')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" value="{{$title}}" placeholder="Enter title" required>
                      <input type="hidden" name="id" value="{{$id}}">
                    </div>
                    <div class="form-group">
                      <label for="sub_title">Icon Code</label>
                      <input type="text" name="icon" class="form-control" id="icon" value="{{$icon}}" placeholder="example='fas fa-facebook'" required>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea rows="5" cols="30" name="description" class="form-control" id="description" placeholder="Enter Description" required>{{$description}}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        <br><br><br>
    </div>
</main>
@endsection