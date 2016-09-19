@extends ('main')

@section ('title', "|$post->slug")

@section ('content')

<div class="row main-content">
	<div class="col-md-8">
		<img src="{{ asset('assets/images/'.$post->image) }}">
		<h1> {{ $post->title }} </h1>
		<small class="meta">Created At: 
		{{ date('jS M Y', strtotime($post->created_at)) }}  
		</small>
		<p> {!! $post->body !!} </p>
		<br>
		<div class="tags">
			@foreach ($post->tags as $tag)
			<label class="label label-default"> {{ $tag->name }} </label>
			@endforeach
		</div>
		<hr>
		<p class="meta">Posted In: {{ $post->category->name }} </p>
	</div>
	<div class="col-md-3 col-md-offset-1">
		<h1>Sidebar</h1>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8">
		<span class="fa-stack fa-2x has-badge" data-count="{{ $post->comments()->count() }}">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa fa-comment fa-stack-1x fa-inverse"></i>
		</span> <strong> Comments</strong>
		@foreach ($post->comments as $comment)
			<div class="comment">
				<div class="author-info">
					<img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email))) }}"
					class="author-image">
					<div class="author-name">
						<h4>
						{{ $comment->name }}
						</h4>
						<small class="meta">
							{{ date('jS M Y', strtotime($comment->created_at)) }}
						</small>
					</div>
				</div>
				<div class="comment-content">
					{{ $comment->comment }}
				</div>
			</div>
		@endforeach
	</div>
</div>
<div class="row">
	<h2>Write a review or comment</h2>
	<hr>
	<div class="col-md-8" id="comment-form">
		{!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}

		<div class="row">
			<div class="col-md-6">
				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>
			<div class="col-md-6">
				{{ Form::label('email', 'Email: ') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
			</div>
			<div class="col-md-12">
				{{ Form::label('comment', 'Comment: ') }}
				{{ Form::textarea('comment', null, ['class' => 'form-control']) }}

				{{ Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block small-spacing']) }}
			</div>
		</div>
	</div>
</div>

@endsection