@extends ('main')

@section ('title', '|Profile')

@section ('content')


<div class="row main-content">
	<div class="col-md-10 col-md-offset-1">
	<img src="/uploads/{{ $user->avatar }}" class="profile-update">
		<h2 class="profile-info"> {{ $user->name }}'s Profile </h2>
		<form action="/profile" enctype="multipart/form-data" method="POST" class="profile-form">
			<label>Update Profile Image</label>
			<input type="file" name="avatar">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
			<input type="submit" class="btn btn-primary" value="upload">
		</form>
	</div>
</div>

@endsection