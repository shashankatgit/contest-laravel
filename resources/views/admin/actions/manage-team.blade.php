@extends('layouts.admin-master')

@section('title')
    Manage Teams
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/edit.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/manageTeams.css')}}"/>
@endsection

@section('content')
    <div class="mid-content ds">
        @include('includes.info-box')
        <h2>Manage Teams</h2>
        <hr>
        <div class="heading-add-team centered">
            <h4>Add a new team</h4>
        </div>
        <br>
        <form class="form-horizontal" action="{{route('admin.postAddTeam')}}" method="post" role="form"
              accept-charset="UTF-8">

            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Team ID</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="id" value="{{$newTeamId}}">
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
        <hr>
        <div class="table-responsive ">
            <table class="table">
                <thead>
                <tr class="danger">
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-4">Members</th>
                    <th class="col-sm-2">Level</th>
                    <th class="col-sm-3">Successful Attempt</th>
                    <th class="col-sm-2"></th>
                </tr>
                </thead>

                @foreach($teams as $team)
                    <tr class="success">
                        <td>{{$team->id}}</td>
                        <td></td>
                        <td>{!!$team->level!!}</td>
                        <td>{{--$team->last_correct_attempt->diffForHumans()--}}</td>
                        <td><a href="{{route('admin.editTeam',$team->id)}}">
                                <button class="btn-danger">Edit Team</button>
                            </a></td>
                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection