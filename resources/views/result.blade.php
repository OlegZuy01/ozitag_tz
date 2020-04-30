@extends('layouts.app')


@section('content')
    <div class="main container">
        @foreach($allAds as $ads)
            <div class="ads row">
                <div class="col-4">
                    <img src="{{$ads->img_url}}" alt="{{$ads->title}}">
                </div>
                <div class="col-8">
                    <h2>{{$ads->title}}</h2>
                    <p>{{$ads->text}}</p>
                    <p><b>регион:</b> {{$ads->city->city}}</p>
                    <p><b>категория:</b> {{$ads->category->category}}</p>
                    <span>{{$ads->price}}</span>
                </div>
            </div>
        @endforeach
        {{$allAds->links()}}
    </div>
@endsection
