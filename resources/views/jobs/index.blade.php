@extends('layouts.app')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@section('content')
    <div class="container">
        <div class="row">
            <h1>Jobs list page</h1>

            <div class="col-md-8">
                @foreach($jobs as $job)
                    <div>
                        <a href="#">{{str_limit($job->title, 50)}}</a>
                        <small>Created by : {{$job->user->name}} - {{$job->created_at->diffForHumans()}}
                        </small>
                    </div>
                @endforeach

                <div class="pull-left">
                    {{ $jobs->appends([
                        'search' => Request::get('search'),
                        'paginate' => Request::get('paginate'),
                        'order' => Request::get('order'),
                        'from' => Request::get('from'),
                        'to' => Request::get('to')
                    ])->links() }}
                </div>
            </div>



            <div class="col-md-4" style="border: 1px solid silver; padding: 2%;">
                <form action="jobs" method="get" id="form">
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" name="search" class="form-control" id="search" value="{{Request::get('search')}}">
                    </div>

                    <div class="form-group">
                        <label for="paginate">Paginate:</label>
                        <select name="paginate" class="form-control" id="paginate" >
                            <option disabled selected>Chose...</option>
                            <option {{Request::get('paginate') == 3 ? "selected" : ''}}>3</option>
                            <option {{Request::get('paginate') == 5 ? "selected" : ''}}>5</option>
                            <option {{Request::get('paginate') == 10 ? "selected" : ''}}>10</option>
                        </select>
                    </div>

                    <div class="form-group" role="group" aria-label="...">
                        <input type="radio" class="order" value="latest" name="order" {{Request::get('order') == 'latest' ? 'checked' : ''}}>Latest</input>
                        <input type="radio" class="order" value="oldest" name="order"{{Request::get('order') == 'oldest' ? 'checked' : ''}}>Oldest</input>
                    </div>

                    <div class="form-group">
                        <input type="text" id="datepicker" class="form-control" name="from" placeholder="Date From" value="{{Request::get('from')}}">
                    </div>

                    <div class="form-group">
                        <input type="text" id="datepickerTo" class="form-control" name="to" placeholder="Date to" value="{{Request::get('to')}}">
                    </div>
                    <hr>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{url()->current()}}" style="margin-bottom: 10px" class="btn btn-danger pull-right" >Clear filters</a>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

        $( function() {
            $( "#datepickerTo" ).datepicker();
        } );
    </script>
@stop