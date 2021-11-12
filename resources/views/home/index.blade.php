@extends('layouts.app')

@section('content')
    {{-- <form action=" {{route('homePage')}} ">
        <div>
            <category-selector/>
        </div>
        <div>
            <button type="submit">Lọc</button>
        </div>
    </form> --}}
    @foreach($articles as $article)
        <div class="card" style="width: 270px; display:inline-block">
            <div class="card-body">
                @foreach ($users as $user)
                    @if($user->id === $article->user_id)
                        <h5 class="card-title">{{ $user->name }} đã đăng {{ $article->title }}</h5>
                        <p><time datetime="{{ $article->created_at }}"> {{$article->created_at->diffForHumans()}} </time></p>
                        <p class="card-text">{{ $article->content}}</p>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
    <create-article/>
@endsection

<style>
    .w-5 {
        display: none;
    }

    div.flex {
        display: none;
    }
    div.hidden div:first-child{
        display: none;
    }
    div.hidden div:last-child{
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
</style>