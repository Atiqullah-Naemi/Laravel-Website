@extends('main')

@section('title', '|About Us')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Contact Us</h1>
		<hr>
		<form action="#" method="post">
			<div class="form-group">
				<label>Name: </label>
				<input type="text" class="form-control" placeholder="Your Name">
			</div>
			<div class="form-group">
				<label>Email: </label>
				<input type="email" class="form-control" placeholder="Your Email">
			</div>
			<div class="form-group">
				<label>Phone: </label>
				<input type="number" class="form-control" placeholder="Your Number">
			</div>
			<div class="form-group">
				<label>Message: </label>
				<textarea class="form-control" rows="10"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary pull-right">Send Message</button>
			</div>
		</form>
	</div>
</div>

@endsection