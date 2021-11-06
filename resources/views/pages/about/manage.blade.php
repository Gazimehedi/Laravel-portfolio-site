@extends('layouts.admin_layout')
@section('page_title','About')
@section('about_select','active')
@section('about_form_select','show')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage About</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">About</li>
            <li class="breadcrumb-item active">Manage</li>
        </ol>
        <div class="row">
          <div class="col-md-8 offset-2 card p-4">
              <form action="{{url('admin/about/manage_proccess')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="title1">Title #1</label>
                    <input type="text" name="title1" class="form-control" id="title1" value="{{$title1}}" placeholder="Enter title 1" required>
                    <input type="hidden" name="id" value="{{$id}}">
                  </div>
                  <div class="form-group">
                    <label for="title2">Title #2</label>
                    <input type="text" name="title2" class="form-control" id="title2" value="{{$title2}}" placeholder="Enter title 2" required>
                  </div>
                  <div class="form-group">
                    @if ($image!='')
                      <br>
                      <img width="250px" src="{{asset('uploads/about/'.$image)}}" class="img rounded" alt="">
                      <br>
                    @endif
                      <label for="image">Portfolio Image</label>
                      <input type="file" name="image" class="form-control" id="image">
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