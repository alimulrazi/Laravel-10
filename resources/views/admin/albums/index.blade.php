@extends('admin.layouts.app')

@section('admincontent')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Albums</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of albums</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($albums as $album)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/storage/album_covers').'/'.$album->cover_image }}" height="200px"
                            class="card-img-top" alt="Album Image">
                        <div class="card-body">
                            <h5 class="card-title">{{$album->name}}</h5>
                            <p class="card-text">{{$album->description}}</p>
                            <a href="{{route('admin.albums.show' , $album->id)}}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection