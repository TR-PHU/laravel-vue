@extends('layouts.app')

@section('content')
<form action="{{route('userArticle.update', ['article' => $article]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-gruop">  
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$article->title}}">
        </div>
        <div>
            <category-selector/>
        </div>
        <div>
            <location-selector/>
        </div>
        <div class="form-gruop">  
            <label for="title">Valid date:</label>
            <input type="date" class="form-control" name="valid_date" min="{{ \Carbon\Carbon::now()->addDay(1)->toDateString() }}" value="{{ $article->valid_date}}">
        </div>
        <div class="form-gruop">  
            <label for="content">Content:</label>
            <textarea name="content" rows="10" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="form-gruop">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</form>
@endsection