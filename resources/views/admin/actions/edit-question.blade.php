@extends('layouts.admin-master')

@section('title')
    Edit Question
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/add.css')}}"/>
@endsection

@section('content')
    <div class="mid-content ds">
        @include('includes.info-box')
        <h2>Edit Question - {{$id}}</h2>

        <form class="form-horizontal" action="{{route('admin.postEditQuestion')}}" method="post" role="form"
              accept-charset="UTF-8"
              enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Question Text</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="5" id="text" name="text" required="">{{$question->text}}</textarea>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="image">Change Image</label>

                <div class="col-sm-7">
                    <img src="{{route('get.questionimage',$id)}}"/>
                    <input class="form-control" type="file" accept="image/*" name="image" id="image">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="answer">Answer</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="answer" name="answer" required=""
                           value="{{$question->answer}}">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$question->id}}">
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

@endsection
