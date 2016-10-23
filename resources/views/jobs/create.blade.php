@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Job submission page</h1>

            <div class="col-md-8">
                @foreach($jobs as $job)
                    <div><a href="#">{{str_limit($job->title, 50)}}</a> <small>{{$job->created_at->diffForHumans()}}</small></div>
                @endforeach
            </div>

            <div class="col-md-4">
                @include('partials.status')
                @include('partials.errors')

                <form action="job-submission" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{old('description')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection
