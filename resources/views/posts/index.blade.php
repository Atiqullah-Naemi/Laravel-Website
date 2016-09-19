@extends ('main')

@section ('title', 'Posts')

@section ('content')

<div class="row main-content">
	<div class="col-md-6">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-6">
		<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg top-spacing pull-right">
		<i class="fa fa-pencil"></i> Create New Post</a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<form role="form" id="searchform">
		  <div class="input-group">
		  <span class="input-group-addon" id="sizing-addon1">
		  	<i class="fa fa-search"></i>
		  </span>
		    <input type="text" id="myInput" class="form-control input-lg" onkeyup="myFunction()" placeholder="Search Title...">
		  </div>
		</form>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Content</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td> {{ $post->id }} </td>
					<td> {{ $post->title }} </td>
					<td> {{ substr($post->body, 0, 100) }} 
					{!! strlen($post->body) > 100 ? '...' : '' !!} </td>
					<td>
						<div class="col-md-6">
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default">
						<i class="fa fa-book"></i> View</a>
						</div>
						<div class="col-md-6">
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default">
						<i class="fa fa-edit"></i> Edit</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="pull-right">
			{{ $posts->links() }}
		</div>
	</div>
</div>

@endsection

@section ('scripts')
<script src="/assets/js/laraweb.js"></script>
@endsection