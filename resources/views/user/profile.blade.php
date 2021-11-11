@extends('layouts.app')

@section('content')
    <div class="card text-center" style="width: 18rem; margin: auto auto;">
        @foreach ($users as $user)
        <img src="https://scontent.fvca1-2.fna.fbcdn.net/v/t1.30497-1/c59.0.200.200a/p200x200/84628273_176159830277856_972693363922829312_n.jpg?_nc_cat=1&ccb=1-5&_nc_sid=12b3be&_nc_ohc=rwm2RFKAQyQAX_JTtis&_nc_ht=scontent.fvca1-2.fna&edm=AHgPADgEAAAA&oh=9b47efb72f30eecfb2f87531020b9438&oe=61B1E339" 
        class="card-img-top" style="border-radius:50%;">
        <div class="card-body">
            <h5 class="card-title">{{ $user->username }}</h5>
            <p class="card-text">{{ $user->email}}</p>
            <a href="/user/article" class="btn btn-primary">My articles</a>
        </div>
        @endforeach
    </div>
@endsection