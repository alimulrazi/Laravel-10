@extends('default')

@section('content')

<div class="d-flex justify-content-end mb-3"><a href="{{ route('posts.create') }}" class="btn btn-info">Create</a></div>

<table class="table table-bordered">
    <caption>Many to many relation example shown in the table</caption>
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>content</th>
            <th>Tags</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                <ul>
                    @foreach($post->tags as $tag)
                    <li>{{ $tag->name }}</li>
                    @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop