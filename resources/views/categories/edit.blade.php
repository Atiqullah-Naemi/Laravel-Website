@extends ('main')

@section ('title', '|Edit Category')

@section ('content')

<div class="row main-content">
	{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
	<div class="col-md-8">
		{{ Form::label('name', 'Category Name: ') }}
		{{ Form::text('name', $category->name, ['class' => 'form-control']) }}
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>More Details</h3>
			</div>
			<div class="panel-body">
				<dl class="dl-horizontal">
					<label>Created At: </label>
					<p> {{ date('jS M Y', strtotime($category->created_at)) }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated At: </label>
					<p> {{ date('jS M Y', strtotime($category->updated_at)) }} </p>
				</dl>
				<hr>
				<div class="col-md-6">
					<a href="{{ route('categories.index') }}" class="btn btn-danger btn-block">Cancel</a>
				</div>
				<div class="col-md-6">
					{{ Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block']) }}
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>

@endsection