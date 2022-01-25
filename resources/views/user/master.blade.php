<!DOCTYPE html>
<html lang="en">
	<head>
        @include('user.partials.head')
        @stack('styles')
    </head>
	<body>
		@include('user.partials.header')

		<div class="section">
			<div class="container">
				@yield('content')
			</div>
		</div>
		@include('user.partials.footer')
	</body>
</html>
