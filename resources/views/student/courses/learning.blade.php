@extends('layouts.main')
@section('content')

	<body class="font-poppins text-[#0A090B]">
		<div class="border-b border-[#EEEEEE]">
			<div class="nav flex items-center w-full h-[92px] mx-auto justify-between p-5">
				<div class="flex items-center gap-4">
					<div class="w-[50px] h-[50px] flex shrink-0 overflow-hidden rounded-full">
						<img src="{{ Storage::url($course->cover) }}" class="object-cover" alt="thumbnail">
					</div>
					<div class="flex flex-col gap-[2px]">
						<p class="font-bold text-lg">{{ $course->name }}</p>
						<p class="text-[#7F8190] text-sm">{{ $course->category->name }}</p>
					</div>
				</div>
			</div>
		</div>

		<form action="{{ route('dashboard.learning.course.answer.store', ['course' => $course, 'question' => $question]) }}"
			method="POST" class="learning flex flex-col gap-[50px] items-center mt-[50px] w-full pb-[30px]">
			@csrf

			<h1 class="w-[821px] font-bold text-[46px] leading-[69px] text-center">
				{{ $question->question }}
			</h1>

			<div class="flex flex-col gap-[30px] max-w-[750px] w-full">

				@foreach ($question->answers as $answer)
					<label for="{{ $answer->id }}"
						class="group flex items-center justify-between rounded-full w-full border border-[#EEEEEE] p-[18px_20px] gap-[14px] transition-all duration-300 has-[:checked]:border-1 has-[:checked]:border-[#0A090B] has-[:checked]:bg-indigo-500 has-[:checked]:text-white">
						<div class="flex items-center gap-[14px]">
							<img src="{{ asset('assets/images/icons/arrow-circle-right.svg') }}" alt="icon">
							<span class="font-semibold text-xl leading-[30px]">
								{{ $answer->answer }}
							</span>
						</div>
						<div class="hidden group-has-[:checked]:block">
							<img src="{{ asset('assets/images/icons/tick-circle.svg') }}" alt="icon">
						</div>
						<input type="radio" name="answer_id" id="{{ $answer->id }}" value="{{ $answer->id }}" class="hidden">
					</label>
				@endforeach
			</div>

			@if ($errors->any())
				<div class="mx-[70px] mt-[30px] flex flex-col gap-5">
					<ul>
						@foreach ($errors->all() as $error)
							<li class="text-red-500">{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<button type="submit"
				class="w-fit p-[14px_40px] bg-[#6436F1] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center align-middle">
				Save & Next Question
			</button>
		</form>
	@endsection
