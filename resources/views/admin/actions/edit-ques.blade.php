@extends('layouts.admin-master')

@section('title')
    Manage Questions
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::to('/assets/custom-css/edit.css')}}"/>
@endsection

@section('content')
    <div class="mid-content ds">
        @include('includes.info-box')
        <h2>Edit Questions</h2>
        <hr>
        <div class="table-responsive ">
            <table class="table">
                <thead>
                <tr class="danger">
                    <th class="col-sm-1">ID</th>
                    <th class="col-sm-3">Text</th>
                    <th class="col-sm-5">Image</th>
                    <th class="col-sm-2">Answer</th>
                    <th class="col-sm-1"></th>
                </tr>
                </thead>

                @foreach($questions as $question)
                    <tr class="success">
                        <td>{{$question->id}}</td>
                        <td>{{$question->text}}</td>
                        <td class="table-image">{!! !isset($question->imageName) ? 'N/A' : '<img src="' . route('get.questionimage',$question->id) . '">'!!}</td>
                        <td>{{$question->answer}}</td>
                        <td><a href="{{route('admin.editQuestion',$question->id)}}"><button class="btn-danger">Edit</button> </a></td>
                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection