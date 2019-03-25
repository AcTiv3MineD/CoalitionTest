<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Track your meals with this awesome app!">

		<title>Coalition Test Project</title>
		<link rel="stylesheet" type="text/css" href="{{ mix( 'css/app.css' ) }}" />
		<link rel="icon" type="image/png" href="{{config('app.app_url')}}favicon.png" />
	</head>
	<body>
		<div id="app"></div>
		<script type="text/javascript" src="{{ mix( 'js/app.js' ) }}"></script>
	</body>
</html>
