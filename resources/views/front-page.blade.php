<!DOCTYPE html>
<html lang="en">
<body>

@include ('partials.header')
@include ('partials.navigation')
@include ('partials.banner')
<div class="container">
  @yield ('content')
</div>
@include ('partials.footer')
	
</body>
</html>