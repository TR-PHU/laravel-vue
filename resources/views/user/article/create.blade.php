@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('userArticle.store') }}" method="POST">
        @csrf
        <div class="form-gruop">  
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div>
            <category-selector/>
        </div>
        <div>
            <location-selector/>
        </div>
        <div class="form-gruop">  
            <label for="title">Valid date:</label>
            <input type="date" class="form-control" name="valid_date" min="{{ \Carbon\Carbon::now()->addDay(1)->toDateString() }}">
        </div>
        <div class="form-gruop">  
            <label for="content">Content:</label>
            <textarea name="content" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-gruop">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
@endsection