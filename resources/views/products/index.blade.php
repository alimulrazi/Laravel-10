
@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('products.create') }}" class="btn btn-info">Create</a></div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>title</th>
				<th>Price</th>
				<th>Description</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{ $loop->iteration }} {{-- Starts with 1 --}}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('products.show', [$product->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>"return confirm('Are you sure you want to delete this item?');"]) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>

@stop
