@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Job submission page</h1>
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
@endsection
