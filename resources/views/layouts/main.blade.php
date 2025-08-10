<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=Poppins:400,500&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-[#0A090B] antialiased">
	<section id="content" class="flex">
		@include('layouts.sidebar')

		<!-- Page Content -->
		<main id="menu-content" class="flex flex-col w-full pb-[30px]">
			@include('layouts.navbar')

			@yield('content')
		</main>
	</section>

	@stack('scripts')
</body>

</html>
