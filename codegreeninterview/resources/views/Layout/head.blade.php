<!DOCTYPE html>
<html lang="en">

<head>
	<style >
		.heading{
			text-align: center;
			color:green;
		}
	</style>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Codegreen Interview</title>

  <!-- Bootstrap core CSS -->
<!--   <link href="{{ asset('Assets/bootstrap/css/bootstrap.min.css.map') }}" rel="stylesheet">
 -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="{{ asset('Assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</head>

<body>
	<div>
		<h1 class="heading">Codegreen Interview</h1>
	</div>

  @yield('content')
  @yield('script')

</body>

</html>