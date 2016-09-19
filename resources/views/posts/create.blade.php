@extends ('main')

@section ('title', '|Create New Post')

@section ('content')

<div class="row main-content">
	<div class="col-md-10 col-md-offset-1">
		<h1>Create A New Post</h1>
		<hr>
		{!! Form::open(array('route' => 'posts.store', 'onsubmit' => 'return(larasubmit())', 'files' => true)) !!}

		{{ Form::label('title', 'Title: ') }}
		{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
		<span id="titleerror"></span><br>

		{{ Form::label('slug', 'URL Slug: ') }}
		{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
		<span id="slugerror"></span><br>

		{{ Form::label('category_id', 'Category: ') }}
		<select name="category_id" class="form-control">
			@foreach ($categories as $category)
			<option value="{{ $category->id }}"> {{ $category->name }} </option>
			@endforeach
		</select>

		{{ Form::label('tags[]', 'Tags: ') }}
		<select name="tags[]" class="form-control lara-select" multiple="multiple">
			@foreach ($tags as $tag)
			<option value="{{ $tag->id }}"> {{ $tag->name }} </option>
			@endforeach
		</select>

		{{ Form::label('featured_img', 'Upload Featured Image') }}
		{{ Form::file('featured_img') }}
		
		{{ Form::label('body', 'Content: ') }}
		{{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '12']) }}
		
		{{ Form::submit('Publish', ['class' => 'btn btn-primary btn-block small-spacing publish']) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection

@section ('scripts')

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>
  	tinymce.init({ 
  		selector:'textarea',
  		plugins: 'link',
  		menubar: false
  		 });
  		 </script>
  	<script src="/assets/js/select2.min.js"></script>
  	<script>
  		$('.lara-select').select2();
  	</script>
  	<script type="text/javascript" src="/assets/js/laraweb.js"></script>
@endsection
