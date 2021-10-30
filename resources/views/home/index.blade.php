@extends('layouts.app')

@section('content')
    <form action=" {{route('homePage')}} ">
        <div>
            <category-selector/>
        </div>
        <div>
            <button type="submit">Lọc</button>
        </div>
    </form>
    @foreach($articles as $article)
        <div>
            <h3>{{ $article->title }}</h3>
        </div>
    @endforeach
@endsection