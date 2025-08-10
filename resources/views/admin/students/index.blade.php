@extends('layouts.main')
@section('content')
	<div class="flex flex-col gap-10 px-5 mt-5">
		<div class="breadcrumb flex items-center gap-[30px]">
			<a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
			<span class="text-[#7F8190] last:text-[#0A090B]">/</span>
			<a href="{{ route('dashboard.courses.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage
				Courses</a>
			<span class="text-[#7F8190] last:text-[#0A090B]">/</span>
			<a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">Course Students</a>
		</div>
	</div>

	<div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
		<div class="flex gap-6 items-center">
			<div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
				<img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-contain" alt="{{ $course->slug }}">
				<p
					class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B] absolute bottom-0 transform -translate-x-1/2 left-1/2 text-nowrap">
					{{ $course->category->name }}
				</p>
			</div>
			<div class="flex flex-col gap-5">
				<h1 class="font-extrabold text-[30px] leading-[45px]">
					{{ $course->name }}
				</h1>
				<div class="flex items-center gap-5">
					<div class="flex gap-[10px] items-center">
						<div class="w-6 h-6 flex shrink-0">
							<img src="{{ asset('assets/images/icons/calendar-add.svg') }}" alt="icon">
						</div>
						<p class="font-semibold">
							{{ $course->created_at->format('F d, Y') }}
						</p>
					</div>
					<div class="flex gap-[10px] items-center">
						<div class="w-6 h-6 flex shrink-0">
							<img src="{{ asset('assets/images/icons/profile-2user-outline.svg') }}" alt="icon">
						</div>
						<p class="font-semibold">{{ $course->students->count() }} students</p>
					</div>
				</div>
			</div>
		</div>
		<div class="relative">
			<a href="{{ route('dashboard.courses.course_student.create', $course) }}"
				class="h-[52px] p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
				Add Student
			</a>
		</div>
	</div>

	<div id="course-test" class="mx-[70px] w-[870px] mt-[30px]">
		<h2 class="font-bold text-2xl">Students</h2>

		<div class="flex flex-col gap-5 mt-2">

			@forelse ($course->students as $student)
				<div class="student-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
					<div class="flex gap-4 items-center">
						<div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
							<img src="{{ asset('assets/images/photos/default-photo.svg') }}" class="w-full h-full object-cover"
								alt="photo">
						</div>
						<div class="flex flex-col gap-[2px]">
							<p class="font-bold text-lg">Angga Parralax</p>
							<p class="text-[#7F8190]">angga@student.sg.com:</p>
						</div>
					</div>
					<div class="flex items-center gap-[14px]">
						<p
							class="p-[6px_10px] rounded-[10px] bg-[#06BC65] font-bold text-xs text-white outline-[#06BC65] outline-dashed outline-[2px] outline-offset-[4px] mr-[6px]">
							Passed</p>
					</div>
				</div>

			@empty
				<div class="student-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
					<div class="flex gap-4 items-center">
						<div class="flex flex-col gap-[2px]">
							<p class="text-[#7F8190]">Empty</p>
						</div>
					</div>
				</div>
			@endforelse

			<div class="student-card w-full flex items-center justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
				<div class="flex gap-4 items-center">
					<div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
						<img src="assets/images/photos/default-photo.svg" class="w-full h-full object-cover" alt="photo">
					</div>
					<div class="flex flex-col gap-[2px]">
						<p class="font-bold text-lg">Angga Parralax</p>
						<p class="text-[#7F8190]">angga@student.sg.com:</p>
					</div>
				</div>
				<div class="flex items-center gap-[14px]">
					<p
						class="p-[6px_10px] rounded-[10px] bg-[#FD445E] font-bold text-xs text-white outline-[#FD445E] outline-dashed outline-[2px] outline-offset-[4px] mr-[6px]">
						Not Passed</p>
				</div>
			</div>

		</div>
	</div>
@endsection
