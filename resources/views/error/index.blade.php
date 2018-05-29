
<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
{{--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>--}}
<link href="{{$static('/css/error/style.css')}}" rel='stylesheet' type='text/css'/><!-- style.css -->
<link href="//fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Playball" rel="stylesheet">
</head>
<body>
<div id="particles-js"></div>
	<div class="main-w3layouts">
	<h1>Laitingyou Error Page</h1>
		<div class="main-agile">
			<h2>Error {{$status_code}}</h2>
			<p>It's looking like you may have taken a wrong turn. Don't worry... It happens to the best of us.</p>
		<div class="botton-w3ls"><a href="/admin/index">Back to home</a></div>
		</div>
		<div class="footer-w3l">
			<p class="agileinfo"> &copy; 2018 Laitingyou Error Page. All Rights Reserved | Design by <a href="/admin/index">laitingyou</a></p>
		</div>
	</div>
	<script src="{{$static('/js/error/particles.js')}}"></script>
	<script src="{{$static('/js/error/app.js')}}"></script>
</body>
</html>
