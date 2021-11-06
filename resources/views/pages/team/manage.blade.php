@extends('layouts.admin_layout')
@section('page_title','Team')
@section('team_select','active')
@section('team_manage_select','active')
@section('team_form_select','show')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Team</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Team</li>
            <li class="breadcrumb-item active">Manage</li>
        </ol>
        <div class="row">
          <div class="col-md-8 offset-2 card p-4">
              <form action="{{url('admin/team/manage_proccess')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$name}}" placeholder="Enter name" required>
                    <input type="hidden" name="id" value="{{$id}}">
                  </div>
                  <div class="form-group">
                    <label for="dasignation">Dasignation</label>
                    <input type="text" name="dasignation" class="form-control" id="dasignation" value="{{$dasignation}}" placeholder="Enter dasignation" required>
                  </div>
                  <div class="form-group">
                    @if ($image!='')
                      <br>
                      <img width="250px" src="{{asset('uploads/team/'.$image)}}" class="img rounded" alt="">
                      <br>
                    @endif
                      <label for="image">Team Image</label>
                      <input type="file" name="image" class="form-control" id="image">
                  </div>
                  <div class="form-group">
                    <label for="fb_link">Facebook Url (optional)</label>
                    <input type="text" name="fb_link" class="form-control" id="fb_link" value="{{$fb_link}}" placeholder="https://www.example.com">
                  </div>
                  <div class="form-group">
                    <label for="tw_link">Twitter Url (optional)</label>
                    <input type="text" name="tw_link" class="form-control" id="tw_link" value="{{$tw_link}}" placeholder="https://www.example.com">
                  </div>
                  <div class="form-group">
                    <label for="in_link">LinkedIn Url (optional)</label>
                    <input type="text" name="in_link" class="form-control" id="in_link" value="{{$in_link}}" placeholder="https://www.example.com">
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
