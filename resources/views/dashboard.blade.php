@extends('layouts.main')
@section('content')
	<div class="flex flex-col px-5 mt-5">
		<div class="w-full flex justify-between items-center">
			<div class="flex flex-col gap-1">
				<p class="font-extrabold text-[30px] leading-[45px]">Dashboard</p>
				<p class="text-[#7F8190]">Provide high quality for best students</p>
			</div>
		</div>
	</div>

	<div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
		<div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
			<div class="flex shrink-0 w-[300px]">
				<p class="text-[#7F8190]">Course</p>
			</div>
			<div class="flex justify-center shrink-0 w-[150px]">
				<p class="text-[#7F8190]">Date Created</p>
			</div>
			<div class="flex justify-center shrink-0 w-[170px]">
				<p class="text-[#7F8190]">Category</p>
			</div>
			<div class="flex justify-center shrink-0 w-[120px]">
				<p class="text-[#7F8190]">Action</p>
			</div>
		</div>

		<div class="list-items flex flex-nowrap justify-between pr-10">
			<div class="flex shrink-0 w-full items-center justify-center">
				<p class="italic">Empty</p>
			</div>
		</div>
	</div>
@endsection
