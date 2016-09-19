@extends ('main')

@section ('title', "|$post->title")

@section ('content')

<div class="row main-content">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2> {{ $post->title }} </h2>
			</div>
			<div class="panel-body">
				{!! $post->body !!}
			</div>
		</div>
		<hr>
		<div class="tags">
			@foreach ($post->tags as $tag)
			<label class="label label-default"> {{ $tag->name }} </label>
			@endforeach
		</div>
		<hr>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="text-center">More Details</h4>
			</div>
			<div class="panel-body">
				<dl class="dl-horizontal">
					<label>URL Slug: </label>
					<p><a href="{{ route('blog.single', $post->slug) }}">
						{{ url('blog/'.$post->slug) }}
					</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Category: </label>
					<p> {{ $post->category->name }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Created At: </label>
					<p> {{ date('jS M, Y', strtotime($post->created_at)) }} </p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated At: </label>
					<p> {{ date('jS M, Y', strtotime($post->updated_at)) }} </p>
				</dl>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-6">
					{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-md-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
					{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
					{!! Form::close() !!}
					</div>
					<hr>
					<div class="col-md-12">
						{!! Html::linkRoute('posts.index', 'View All Posts', array(), array('class' => 'btn btn-default btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div id="backend-comments">
			<button class="btn btn-primary btn-lg">
				<span class="badge"> {{ $post->comments()->count() }} </span> <strong>Comments</strong>
			</button>
		</div>
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Comment</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($post->comments as $comment)
					<tr>
						<td> {{ $comment->name }} </td>
						<td> {{ $comment->email }} </td>
						<td> {{ $comment->comment }} </td>
						<td>
							<div class="col-md-6">
								<a href="#" class="btn btn-default">
								<i class="fa fa-pencil"></i> Edit</a>
							</div>
							<div class="col-md-6">
								<a href="#" class="btn btn-danger">
								<i class="fa fa-trash"></i> Delete</a>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>			

@endsection