@extends ('main')

@section ('title', '|Login')

@section ('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<strong>Login to LaraWeb</strong>
			</div>
			<div class="panel-body">
				{!! Form::open() !!}

				{{ Form::label('email', 'Email: ') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', 'Password: ') }}
				{{ Form::password('password', ['class' => 'form-control']) }}

				<br>
				{{ Form::label('remember', 'Remember Me ') }}
				{{ Form::checkbox('remember') }}

				<hr>
				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

				{!! Form::close() !!}
			</div>
			<div class="panel-footer">
				<p>Don't have an account? 
				<a href="{{ route('register') }}">Register</a></p>
			</div>
		</div>
	</div>
</div>

@endsection