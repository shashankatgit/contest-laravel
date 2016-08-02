@extends('layouts.admin-master')

@section('title')
    Add Admin
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/add.css')}}" />
@endsection

@section('content')

    <div class="mid-content ds">
        @include('includes.info-box')
        <h2>Add an admin</h2>

        <form class="form-horizontal" action="{{route('admin.postAddAdmin')}}" method="post" role="form"
              accept-charset="UTF-8">

            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="name" name="name" required="">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="email" name="email" required="">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="password" name="password" required="">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

@endsection