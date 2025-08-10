@extends('layouts.main')
@section('content')
	<div class="flex flex-col gap-10 px-5 mt-5">
		<div class="breadcrumb flex items-center gap-[30px]">
			<a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
			<span class="text-[#7F8190] last:text-[#0A090B]">/</span>
			<a href="{{ route('dashboard.courses.show', $course) }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">
				Manage Courses
			</a>
			<span class="text-[#7F8190] last:text-[#0A090B]">/</span>
			<span class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Course Question</span>
		</div>
	</div>

	<div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
		<div class="flex gap-6 items-center">
			<div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
				<img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-contain" alt="icon">
				<p
					class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B] absolute bottom-0 transform -translate-x-1/2 left-1/2 text-nowrap">
					{{ $course->category->name }}
				</p>
			</div>
			<div class="flex flex-col gap-5">
				<h1 class="font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
				<div class="flex items-center gap-5">
					<div class="flex gap-[10px] items-center">
						<div class="w-6 h-6 flex shrink-0">
							<img src="{{ asset('assets/images/icons/calendar-add.svg') }}" alt="icon">
						</div>
						<p class="font-semibold">{{ $course->created_at->format('M d, Y') }}</p>
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
	</div>

	<form action="{{ route('dashboard.courses.create.question.store', $course) }}" method="POST" id="add-question"
		class="mx-[70px] mt-[30px] flex flex-col gap-5">
		@csrf

		<h2 class="font-bold text-2xl">Add New Question</h2>

		<div class="flex flex-col gap-[10px]">
			<p class="font-semibold">Question</p>
			<div
				class="flex items-center w-[900px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
				<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
					<img src="{{ asset('assets/images/icons/note-text.svg') }}" class="h-full w-full object-contain" alt="icon">
				</div>
				<input type="text"
					class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
					placeholder="Write the question" name="question" required>
			</div>
		</div>

		@if ($errors->any())
			<ul>
				@foreach ($errors->all() as $error)
					<li class="text-red-500">{{ $error }}</li>
				@endforeach
			</ul>
		@endif

		<div class="flex flex-col gap-[10px]">
			<p class="font-semibold">Answers</p>

			@foreach (range(1, 4) as $index)
				<div class="flex items-center gap-4">
					<div
						class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
						<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
							<img src="{{ asset('assets/images/icons/edit.svg') }}" class="h-full w-full object-contain" alt="icon">
						</div>
						<input type="text"
							class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
							placeholder="Write better answer option" name="answers[]" value="{{ old('answers.' . $index - 1) }}" required>
					</div>
					<label class="font-semibold flex items-center gap-[10px]">
						<input type="radio" name="correct_answer" value={{ $index - 1 }}
							class="w-[24px] h-[24px] appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#2B82FE] ring ring-[#EEEEEE]"
							required />
						Correct
					</label>
				</div>
			@endforeach
		</div>

		<button type="submit"
			class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
			Save Question
		</button>
	</form>
@endsection
