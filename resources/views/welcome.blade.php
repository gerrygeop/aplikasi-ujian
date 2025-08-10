<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=inter:300,400,500,600&display=swap" rel="stylesheet" />

	<!-- Styles / Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#fdfdfc]">

	<header class="bg-white sticky top-0 z-50 shadow-sm">
		<div class="container mx-auto px-6 sm:px-0 py-4">
			<div class="flex items-center justify-between">
				<div class="text-2xl font-bold text-indigo-600">MindGo</div>
				<nav class="hidden md:flex items-center space-x-8">
					<a class="text-gray-700 hover:text-indigo-600" href="#">Fitur</a>
					<a class="text-gray-700 hover:text-indigo-600" href="#">Harga</a>
					<a class="text-gray-700 hover:text-indigo-600" href="#">Testimoni</a>
					<a class="text-gray-700 hover:text-indigo-600" href="#">Klien</a>
				</nav>

				@auth
					<div class="flex items-center space-x-4">
						<a href="{{ route('dashboard.learning.index') }}"
							class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Mulai Ujian</a>
					</div>
				@endauth
				@guest
					<div class="flex items-center space-x-6">
						<a href="{{ route('login') }}" class="text-gray-700 px-4 py-2 hover:text-indigo-600">Login</a>
						<a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
							Register
						</a>
					</div>
				@endguest

				<div class="md:hidden">
					<button class="text-gray-600 focus:outline-none">
						<span class="material-icons">menu</span>
					</button>
				</div>
			</div>
		</div>
	</header>

	<main class="bg-[#6436F1] mx-auto py-16 md:py-24">
		<div class="container mx-auto px-6 sm:px-0 grid md:grid-cols-2 gap-12 items-center">
			<div class="text-center md:text-left">
				<h1 class="text-4xl md:text-6xl font-bold text-yellow-300 leading-tight">
					Ujian Online Lebih Mudah, Cepat, dan Aman
				</h1>
				<p class="mt-6 text-gray-100 text-lg">
					Platform ujian online canggih untuk sekolah, kampus, dan perusahaan dengan
					fitur lengkap untuk pengalaman tes terbaik.
				</p>
				<div class="mt-8 flex justify-center md:justify-start space-x-4">
					<a class="bg-white text-indigo-900 px-6 py-3 rounded-md text-lg font-semibold hover:bg-yellow-300" href="#">
						Mulai Ujian
					</a>
					<a
						class="bg-indigo-500 text-gray-100 pr-6 pl-4 py-3 rounded-md text-lg font-semibold border border-gray-300 hover:bg-indigo-700 flex items-center"
						href="#">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-6 mr-2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
						</svg>

						Lihat Demo
					</a>
				</div>
			</div>
			<div>
				<img src="{{ asset('assets/images/thumbnail/sign-in-illustration.png') }}" class="w-full h-full object-contain"
					alt="banner">
			</div>
		</div>
	</main>

	<section class="bg-white py-16 md:py-24">
		<div class="container mx-auto px-6">
			<div class="text-center mb-12">
				<h2 class="text-3xl md:text-4xl font-bold text-gray-800">Fitur Utama Platform Kami</h2>
				<p class="mt-4 text-gray-600">Semua yang Anda butuhkan untuk menyelenggarakan ujian online yang efisien.</p>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
						</svg>

					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Bank Soal</h3>
					<p class="text-gray-600">Kelola ribuan soal dengan mudah, terorganisir berdasarkan mata pelajaran dan tingkat
						kesulitan.</p>
				</div>
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
						</svg>
					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Jadwal Ujian</h3>
					<p class="text-gray-600">Atur jadwal ujian fleksibel, tentukan durasi, dan kelola peserta dengan praktis.</p>
				</div>
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
						</svg>
					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Nilai Otomatis</h3>
					<p class="text-gray-600">Hemat waktu dengan sistem penilaian otomatis untuk berbagai jenis soal.</p>
				</div>
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
						</svg>
					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Analisis Hasil</h3>
					<p class="text-gray-600">Dapatkan laporan dan analisis mendalam tentang performa peserta ujian.</p>
				</div>
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
						</svg>
					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Anti-Cheat System</h3>
					<p class="text-gray-600">Jaga integritas ujian dengan sistem pengawasan canggih untuk mencegah kecurangan.</p>
				</div>
				<div class="p-8 bg-gray-50 rounded-lg text-center">
					<div class="bg-indigo-100 text-indigo-600 rounded-full p-4 inline-flex mb-4">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							stroke="currentColor" class="size-8">
							<path stroke-linecap="round" stroke-linejoin="round"
								d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-15a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 4.5v15a2.25 2.25 0 0 0 2.25 2.25Z" />
						</svg>
					</div>
					<h3 class="text-xl font-bold text-gray-800 mb-2">Responsif</h3>
					<p class="text-gray-600">Akses ujian dari berbagai perangkat, mulai dari desktop hingga smartphone dengan lancar.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-gray-50 py-16 md:py-24">
		<div class="container mx-auto px-6">
			<div class="text-center mb-12">
				<h2 class="text-3xl md:text-4xl font-bold text-gray-800">Apa Kata Mereka?</h2>
				<p class="mt-4 text-gray-600">Pengalaman pengguna yang telah mempercayai AnggaCBT.</p>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="bg-white p-8 rounded-lg shadow">
					<div class="flex items-center mb-4">
						<div class="flex text-yellow-400">
							@foreach (range(1, 4) as $star)
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
									<path fill-rule="evenodd"
										d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
										clip-rule="evenodd" />
								</svg>
							@endforeach
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
							</svg>
						</div>
					</div>
					<p class="text-gray-600 mb-6">"AnggaCBT sangat membantu kami dalam melaksanakan ujian semester. Fitur bank soal
						dan
						analisis nilainya luar biasa!"</p>
					<div class="flex items-center">
						<img alt="Avatar pengguna" class="w-12 h-12 rounded-full mr-4"
							src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQN2h_CEQ_-NPz4-4HhtrAF7btHCBnsKtonH0sN00LH3aaIZAdKZrU69yPEqlh7hTEwb8nO02yuwwQsbverWfn-n2F-gkklUW0C3jawEmauk3GHGTe4QanbBmmjx8LFMzFipMAlyTgozOy2wituCAJ1_kCVem5Of0HXqYpijQiMTgiO8eTvy1SsNoK6x1aJzVSUdpw0hzDrq2exYvPHH7p8ObBnrS_WH5aPdN1FGKz3Cx4cCNrA5N6Ir5CNxzry9MME4mn4y-F65Jm" />
						<div>
							<p class="font-bold text-gray-800">Budi Hartono</p>
							<p class="text-sm text-gray-500">Kepala Sekolah, SMA Negeri 1</p>
						</div>
					</div>
				</div>

				<div class="bg-white p-8 rounded-lg shadow">
					<div class="flex items-center mb-4">
						<div class="flex text-yellow-400">
							@foreach (range(1, 4) as $star)
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
									<path fill-rule="evenodd"
										d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
										clip-rule="evenodd" />
								</svg>
							@endforeach
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
							</svg>
						</div>
					</div>
					<p class="text-gray-600 mb-6">"Platform yang user-friendly dan sangat stabil. Sistem anti-cheatnya juga efektif
						menjaga kredibilitas ujian online kami."</p>
					<div class="flex items-center">
						<img alt="Avatar pengguna" class="w-12 h-12 rounded-full mr-4"
							src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtOfrjI-VJfmhtVHGHS2I2TzFECZu7VkfCatTBJ3_ftI5iq1VtHRMm2Cul2fzh5Aa_iWDQANDoMAL2_fZWVTgbZ48rJPUUtRVb4geme0bKtLf-fq_GleGYOZMpEaCcF1slbcDVelaBCZwdJF-nym00L-sdupcB-mxYzbVof0p24WvytNYVLPpgqkvw1CJY9A41nuNiImAUVjWG-PRpX7F8xmJASAGbWthoCbdgpq0obJrym3kh5eSscbGO4yqL-VTnqTR9eBfXFF3M" />
						<div>
							<p class="font-bold text-gray-800">Citra Lestari</p>
							<p class="text-sm text-gray-500">Dosen, Universitas Teknologi</p>
						</div>
					</div>
				</div>

				<div class="bg-white p-8 rounded-lg shadow">
					<div class="flex items-center mb-4">
						<div class="flex text-yellow-400">
							@foreach (range(1, 5) as $star)
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
									<path fill-rule="evenodd"
										d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
										clip-rule="evenodd" />
								</svg>
							@endforeach
						</div>
					</div>
					<p class="text-gray-600 mb-6">"Proses rekrutmen jadi lebih efisien. Kami bisa melakukan tes seleksi karyawan
						secara serentak di berbagai lokasi."</p>
					<div class="flex items-center">
						<img alt="Avatar pengguna" class="w-12 h-12 rounded-full mr-4"
							src="https://lh3.googleusercontent.com/aida-public/AB6AXuCr9KqZ9thmRjsQM6es10YdmmI95NgaCZG2SltG1a3BntEYMhtg-rFucNajsfwL-c5i415Tna5bs9yBMj3oD9cCClEbHhqIGf-eL-jPaAVrRYrbVbkvZeB48uXujGKEyRJqxWlqbtfyhKcoNzuaGfUuzv4t3d8T5rZKz1Pn9qjpaBiLMBR0u5rbrESo4aFcHE0kiRTGl-0VPRZdcT3hCOeaa4zHxvjmwp3trssxm9jHzQodHa3XfPEmYOqKq1stTNjS7BSdm8Zy0GeX" />
						<div>
							<p class="font-bold text-gray-800">Andi Wijaya</p>
							<p class="text-sm text-gray-500">HR Manager, PT Maju Sejahtera</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-indigo-500 py-16">
		<div class="container mx-auto px-6">
			<p class="text-center text-yellow-200 text-xl mb-8">Dipercaya oleh institusi pendidikan dan perusahaan terkemuka</p>
			<div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-6">
				<img alt="logo" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-51.svg') }}">
				<img alt="logo" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-52.svg') }}">
				<img alt="Logo klien 2" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-51-1.svg') }}" />
				<img alt="Logo klien 3" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-51.svg') }}" />
				<img alt="Logo klien 4" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-52-1.svg') }}" />
				<img alt="Logo klien 5" class="h-8 opacity-60 hover:opacity-100 transition"
					src="{{ asset('assets/images/logo/logo-52.svg') }}" />
			</div>
		</div>
	</section>

	<section class="bg-gray-50 py-16 md:py-24">
		<div class="container mx-auto px-6">
			<div class="text-center mb-12">
				<h2 class="text-3xl md:text-4xl font-bold text-gray-800">Paket Harga yang Fleksibel</h2>
				<p class="mt-4 text-gray-600">Pilih paket yang paling sesuai dengan kebutuhan Anda.</p>
			</div>

			<div class="grid md:grid-cols-3 gap-8">
				<div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-gray-200">
					<h3 class="text-2xl font-bold text-gray-800 mb-4">Sekolah</h3>
					<p class="text-4xl font-bold text-gray-800 mb-2">
						Rp 500k
						<span class="text-lg font-normal text-gray-500">/bln</span>
					</p>
					<p class="text-gray-500 mb-6">Ideal untuk sekolah dan lembaga kursus.</p>

					<ul class="space-y-4 text-gray-600 mb-8">
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							500 Peserta Aktif
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 mr-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Bank Soal Tanpa Batas
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Dukungan Email
						</li>
					</ul>
					<a
						class="w-full block text-center bg-white text-indigo-600 border border-indigo-600 px-6 py-3 rounded-md font-semibold hover:bg-indigo-50"
						href="#">
						Pilih Paket
					</a>
				</div>
				<div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-indigo-600 transform scale-105">
					<div class="flex justify-between items-center">
						<h3 class="text-2xl font-bold text-gray-800 mb-4">Kampus</h3>
						<span class="bg-indigo-100 text-indigo-600 text-xs font-bold px-3 py-1 rounded-full">POPULER</span>
					</div>

					<p class="text-4xl font-bold text-gray-800 mb-2">
						Rp 1.5jt
						<span class="text-lg font-normal text-gray-500">/bln</span>
					</p>
					<p class="text-gray-500 mb-6">
						Untuk perguruan tinggi dan universitas.
					</p>
					<ul class="space-y-4 text-gray-600 mb-8">
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							2000 Peserta Aktif
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Bank Soal Tanpa Batas
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Fitur Anti-Cheat
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Dukungan Prioritas
						</li>
					</ul>
					<a
						class="w-full block text-center bg-indigo-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-indigo-700"
						href="#">
						Pilih Paket
					</a>
				</div>

				<div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-gray-200">
					<h3 class="text-2xl font-bold text-gray-800 mb-4">Perusahaan</h3>
					<p class="text-4xl font-bold text-gray-800 mb-2">
						Hubungi
						<span class="text-lg font-normal text-gray-500">
							Kami
						</span>
					</p>
					<p class="text-gray-500 mb-6">Solusi custom untuk kebutuhan korporat.</p>
					<ul class="space-y-4 text-gray-600 mb-8">
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Peserta Custom
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Integrasi API
						</li>
						<li class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
								class="size-6 text-purple-400 m-2">
								<path fill-rule="evenodd"
									d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
									clip-rule="evenodd" />
							</svg>
							Manajer Akun Khusus
						</li>
					</ul>
					<a
						class="w-full block text-center bg-white text-indigo-600 border border-indigo-600 px-6 py-3 rounded-md font-semibold hover:bg-indigo-50"
						href="#">
						Hubungi Sales
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="bg-indigo-500">
		<div class="container mx-auto px-6 py-16 md:py-20 text-center">
			<h2 class="text-3xl md:text-4xl font-bold text-white">
				Siap Mengubah Cara Anda Menggelar Ujian?
			</h2>
			<p class="mt-4 text-indigo-200 text-lg">
				Bergabunglah dengan ribuan institusi lain dan mulai pengalaman ujian online
				terbaik hari ini.
			</p>
			<div class="mt-8">
				<a class="bg-white text-indigo-600 px-8 py-4 rounded-md text-lg font-semibold hover:bg-gray-100" href="#">
					Mulai Gratis Sekarang
				</a>
			</div>
		</div>
	</section>

	<footer class="bg-gray-800 text-white">
		<div class="container mx-auto px-6 py-12">
			<div class="grid md:grid-cols-4 gap-8">
				<div>
					<h3 class="text-xl font-bold mb-4">AnggaCBT</h3>
					<p class="text-gray-400">Platform ujian online modern untuk semua kebutuhan.</p>
				</div>
				<div>
					<h4 class="font-semibold mb-4">Produk</h4>
					<ul class="space-y-2 text-gray-400">
						<li><a class="hover:text-white" href="#">Fitur</a></li>
						<li><a class="hover:text-white" href="#">Harga</a></li>
						<li><a class="hover:text-white" href="#">Keamanan</a></li>
						<li><a class="hover:text-white" href="#">Demo</a></li>
					</ul>
				</div>
				<div>
					<h4 class="font-semibold mb-4">Perusahaan</h4>
					<ul class="space-y-2 text-gray-400">
						<li><a class="hover:text-white" href="#">Tentang Kami</a></li>
						<li><a class="hover:text-white" href="#">Kontak</a></li>
						<li><a class="hover:text-white" href="#">Karir</a></li>
					</ul>
				</div>
				<div>
					<h4 class="font-semibold mb-4">Legal</h4>
					<ul class="space-y-2 text-gray-400">
						<li><a class="hover:text-white" href="#">Kebijakan Privasi</a></li>
						<li><a class="hover:text-white" href="#">Syarat &amp; Ketentuan</a></li>
					</ul>
				</div>
			</div>
			<div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-500">
				<p>© {{ date('Y') }} AnggaCBT. All rights reserved.</p>
			</div>
		</div>
	</footer>
</body>

</html>
