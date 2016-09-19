@extends ('main')

@section ('title', '|Tags')

@section ('content')

<div class="row main-content">
	<div class="col-md-8">
		<h1>All Tags</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tag Name</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tags as $tag)
				<tr>
					<td> {{ $tag->id }} </td>
					<td> {{ $tag->name }} </td>
					<td>
						<div class="col-md-12">
							<a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default">
								<i class="fa fa-book"></i> View
							</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-3 col-md-offset-1">
		<div class="well">
			{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

			{{ Form::label('name', 'Tag Name: ') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			
			<hr>
			{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection