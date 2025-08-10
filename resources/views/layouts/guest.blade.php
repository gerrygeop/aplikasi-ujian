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

<body class="font-sans text-gray-900 antialiased">
	<section id="signup" class="flex w-full min-h-[832px]">
		<nav class="flex items-center px-[50px] pt-[30px] w-full absolute top-0">
			<div class="flex items-center">
				<a href="/">
					<img src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo">
				</a>
			</div>
			<div class="flex items-center justify-end w-full">
				<ul class="flex items-center gap-[30px]">
					<li>
						<a href="" class="font-semibold text-white">Docs</a>
					</li>
					<li>
						<a href="" class="font-semibold text-white">About</a>
					</li>
					<li>
						<a href="" class="font-semibold text-white">Help</a>
					</li>
					<li class="h-[52px] flex items-center">
						@if (request()->routeIs('login'))
							<a href="{{ route('register') }}"
								class="font-semibold text-white p-[14px_30px] bg-[#0A090B] rounded-full text-center">
								Register
							</a>
						@else
							<a href="{{ route('login') }}"
								class="font-semibold text-white p-[14px_30px] bg-[#0A090B] rounded-full text-center">
								Login
							</a>
						@endif
					</li>
				</ul>
			</div>
		</nav>

		{{ $slot }}

		<x-right-side-auth />
	</section>
</body>

</html>
