@extends('layouts.app')

@section('content')

@if (count($album->photos) > 0)

<div class="row">
    @foreach ($album->photos as $photo)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="/storage/albums/{{$album->id}}/{{$photo->photo}}" height="200px" class="card-img-top"
                alt="photo Image">
            <div class="card-body">
                <h5 class="card-title">{{$photo->name}}</h5>
                <p class="card-text">{{$photo->description}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<p>No photos to display</p>
@endif

@endsection