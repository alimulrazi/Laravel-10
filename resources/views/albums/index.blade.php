@extends('layouts.app')

@section('content')

<h1> Albums </h1>
<div class="row">
    @foreach ($albums as $album)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset('/storage/album_covers').'/'.$album->cover_image }}" height="200px" class="card-img-top"
                alt="Album Image">
            <div class="card-body">
                <h5 class="card-title">{{$album->name}}</h5>
                <p class="card-text">{{$album->description}}</p>
                <a href="{{route('albums.show' , $album->id)}}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection