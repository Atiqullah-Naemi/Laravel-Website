@extends ('main')

@section ('title', "|Edit $post->title")

@section ('content')

<div class="row main-content">
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

	<div class="col-md-8">
		{{ Form::label('title', 'Title: ') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}

		{{ Form::label('category_id', 'Category: ') }}
		{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

		{{ Form::label('tags', 'Tags: ') }}
		{{ Form::select('tags[]', $tags, null, ['class' => 'form-control lara-select', 'multiple' => 'multiple']) }}

		{{ Form::label('body', 'Content: ') }}
		{!! Form::textarea('body', null, array('class' => 'form-control', 'rows' => '12')) !!}
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">More Details</div>
			<div class="panel-body">
				<dl class="dl-horizontal">
					<label>URL Slug: </label>
					<p><a href="{{ route('blog.single', $post->slug) }}">
					{{ url('blog/'.$post->slug) }} </a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category: </label>
					<p> {{ $post->category->name }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At: </label>
					<p> {{ date('jS M Y', strtotime($post->created_at)) }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated At: </label>
					<p> {{ date('jS M Y', strtotime($post->updated_at)) }} </p>
				</dl>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-md-6">
						{{ Form::submit('Save Changes', array('class' => 'btn btn-primary btn-block')) }}
					</div>
				</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}
</div>

@endsection

@section ('scripts')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea', plugins: 'link', menubar: false });</script>
  	<script src="/assets/js/select2.min.js"></script>
  	<script>
  		$('.lara-select').select2();
  	</script>
@endsection