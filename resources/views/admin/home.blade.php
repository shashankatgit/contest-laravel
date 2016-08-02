@extends('layouts.admin-master')

@section('title')
    Home
@endsection

@section('content')
    <div class="mid-content ds">
        <h2>Welcome Mr. {{Auth::guard('admins')->user()->name}}</h2>
        <p></p>
    </div>

@endsection