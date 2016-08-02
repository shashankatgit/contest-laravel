@extends('layouts.admin-master')

@section('title')
    Add Questions
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/add.css')}}" />
@endsection

@section('content')

    <div class="mid-content ds">
        @include('includes.info-box')
        <h2>Add Question</h2>

        <form class="form-horizontal" action="{{route('admin.postAdd')}}" method="post" role="form" accept-charset="UTF-8"
              enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-3" for="text">Question Text</label>
                <div class="col-sm-7">
                    <textarea class="form-control" rows="5" id="text" name="text" required=""></textarea>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="image">Choose Image</label>
                <div class="col-sm-7">
                    <input class="form-control" type="file" accept="image/*" name="image" id="image">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="answer">Answer</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="answer" name="answer" required="">
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-2 col-sm-offset-5">
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
             </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

@endsection