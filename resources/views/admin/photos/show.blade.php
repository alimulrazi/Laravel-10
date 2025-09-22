@extends('admin.layouts.app')

@section('admincontent')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Photo</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Photo</h6>
        </div>
        <div class="card-body">

            <h1>{{$photo->title}}</h1>
            <a href="/albums/{{$photo->album->id}}" class="btn btn-secondary m-2">Back</a>
            <form action="{{route('admin.photos.destroy' , $photo->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger m-2">Delete</button>
            </form>
            <div>
                <img src="/storage/albums/{{$photo->album->id}}/{{$photo->photo}}" alt="" height="500px">
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection