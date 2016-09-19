@extends ('main')

@section ('title', '|Register')

@section ('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<strong>Register to LaraWeb</strong>
			</div>
			<div class="panel-body">
				{!! Form::open() !!}

				{{ Form::label('name', 'Name: ') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::label('email', 'Email: ') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}

				{{ Form::label('password', 'Password: ') }}
				{{ Form::password('password', ['class' => 'form-control']) }}

				{{ Form::label('password_confirmation', 'Confirm Password: ') }}
				{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

				<br>
				{{ Form::label('remember', 'Remember Me ') }}
				{{ Form::checkbox('remember') }}

				<hr>
				{{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}

				{!! Form::close() !!}
			</div>
			<div class="panel-footer">
				<p>Already have an account? 
				<a href="{{ route('login') }}">Login</a>
					
				</p>
			</div>
		</div>
	</div>
</div>

@endsection