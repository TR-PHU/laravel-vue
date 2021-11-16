@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <div class="card" style="width: 270px; display:inline-block">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p><time datetime="{{ $article->created_at }}"> {{$article->created_at->diffForHumans()}} </time></p>
                <p class="card-text">{{ $article->content}}</p>
                <a href="{{ route('userArticle.edit', ['article' => $article]) }}" class="btn btn-primary">Edit</a>
                @include('user.article.delete')
            </div>
        </div>
    @endforeach
    {{ $articles->links('vendor.pagination.custom') }}
    <create-article/>
@endsection

<style>
    .pager {
        margin-bottom: 0px;
    }
    .pager li {
        margin: 40px 10px 20px 10px;
    }
    .pager:hover li span {
        text-decoration: none;
    }
    .pager:hover li a {
        text-decoration: none;
    }
    .pager li {
        padding: 4px 10px;
        border: 1px solid #cccccc;
        border-radius: 12px;
    }
</style>