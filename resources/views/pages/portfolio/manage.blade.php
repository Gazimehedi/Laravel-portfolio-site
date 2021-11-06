@extends('layouts.admin_layout')
@section('page_title','Portfolio')
@section('portfolio_select','active')
@section('portfolio_form_select','show')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Portfolio</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Portfolio</li>
            <li class="breadcrumb-item active">Manage</li>
        </ol>
        <div class="row">
          <div class="col-md-8 offset-2 card p-4">
              <form action="{{url('admin/portfolio/manage_proccess')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control" id="title" value="{{$name}}" placeholder="Enter name" required>
                    <input type="hidden" name="id" value="{{$id}}">
                  </div>
                  <div class="form-group">
                    <label for="sub_title">Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{$sub_title}}" placeholder="Enter sub title" required>
                  </div>
                  <div class="form-group">
                    @if ($image!='')
                      <br>
                      <img height="300px" src="{{asset('uploads/portfolio/'.$image)}}" class="img rounded" alt="">
                      <br>
                    @endif
                      <label for="image">Portfolio Image</label>
                      <input type="file" name="image" class="form-control" id="image">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="client">Client</label>
                        <input type="text" name="client" class="form-control" id="client" value="{{$client}}" placeholder="Enter client" required>
                      </div>
                      <div class="col-md-6">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control" id="category" value="{{$category}}" placeholder="Enter category" required>
                      </div>
                    </div>
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