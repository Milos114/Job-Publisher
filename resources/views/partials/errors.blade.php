@if($errors->has())
    @foreach ($errors->all() as $error)
        <div class="alert-info alert-danger">{{ $error }}</div>
    @endforeach
@endif