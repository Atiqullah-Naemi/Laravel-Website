@extends ('main')

@section ('title', '|Our Blog')

@section ('content')

<div class="row main-content">
	@foreach ($posts as $post)
	<div class="col-md-10 col-md-offset-1">
		@if($post->image)
		<img src="{{ asset('assets/images/'.$post->image) }}">
		@endif
		<h3> {{ $post->title }} </h3>
		<small class="meta">Created At: 
		{{ date('jS M Y', strtotime($post->created_at)) }}
		</small>
		<p>
			{!! substr($post->body, 0, 350) !!}
			{{ strlen($post->body) > 350 ? '...' : '' }}
		</p>
		<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
		<hr>
	</div>
	@endforeach
</div>

<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			{{ $posts->links() }}
		</div>
	</div>
</div>

@endsection