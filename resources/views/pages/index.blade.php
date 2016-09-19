@extends ('front-page')

@section ('title', '|Front Page')

@section ('content')

<div class="row posts">
		<div class="col-md-8">
		@foreach ($posts as $post)
		<h2> {{ $post->title }} </h2>
		<small class="meta">
			Created At: {{ date('jS M Y', strtotime($post->created_at)) }}
		</small>
		<p> 
		{!! substr($post->body , 0, 350) !!} {!! strlen($post->body) > 350 ? '...' : '' !!} 
		</p>
		<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">
		Read More</a>
		<hr>
		@endforeach
	</div>
	<div class="col-md-3 col-md-offset-1">
		<div class="menu">
			<h3>Categories</h3>
			<ul class="list-group">
				@foreach ($categories as $category)
				<li class="list-group-item"><a href="#">
				{{ $category->name }}
				</a>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection