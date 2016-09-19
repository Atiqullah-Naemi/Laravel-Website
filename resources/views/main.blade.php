<!DOCTYPE html>
<html lang="en">
<body>

@include ('partials.header')
@include ('partials.navigation')
<div class="container">
  <div class="main-content">
  	@include ('partials.messages')
  </div>
  @yield ('content')
</div>
@include ('partials.footer')
	
</body>
@yield ('scripts')
</html>