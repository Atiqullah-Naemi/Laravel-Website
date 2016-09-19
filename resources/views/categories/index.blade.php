@extends ('main')

@section ('title', '|Categories')

@section ('content')

<div class="row main-content">
<div class="col-md-12">
	<h1>All Categories</h1>
</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<td> {{ $category->id }} </td>
					<td> {{ $category->name }} </td>
					<td>
						<div class="col-md-6">
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-block">
								<i class="fa fa-edit"></i> Edit
							</a>
						</div>
						<div class="col-md-6">
							{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
		{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

		{{ Form::label('name', 'Category Name: ') }}
		{{ Form::text('name', null, ['class' => 'form-control']) }}

		<hr>
		{{ Form::submit('Create Category', ['class' => 'btn btn-primary btn-block']) }}

		{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection