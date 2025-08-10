<x-guest-layout>

	<div class="left-side min-h-screen flex flex-col w-full pb-[30px] pt-[82px]">
		<div class="h-full w-full flex items-center justify-center">
			<form action="{{ route('register') }}" method="POST" class="flex flex-col gap-[30px] w-[450px] shrink-0">
				@csrf

				<h1 class="font-bold text-2xl leading-9">Register</h1>

				<div class="flex flex-col gap-2">
					<label for="name" class="font-semibold">Complete Name</label>
					<div
						class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
						<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
							<img src="{{ asset('assets/images/icons/profile.svg') }}" class="h-full w-full object-contain" alt="icon">
						</div>
						<input type="text"
							class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
							placeholder="Write your correct input here" name="name" value="{{ old('name') }}" required autofocus
							autocomplete="name">
					</div>
					<x-input-error :messages="$errors->get('name')" class="mt-2" />
				</div>

				<div class="flex flex-col gap-2">
					<label for="email" class="font-semibold">Email Address</label>
					<div
						class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
						<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
							<img src="assets/images/icons/sms.svg" class="h-full w-full object-contain" alt="icon">
						</div>
						<input type="email"
							class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
							placeholder="Write your correct input here" name="email" value="{{ old('email') }}" required
							autocomplete="email">
					</div>
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>

				<div class="flex flex-col gap-2">
					<label for="password" class="font-semibold">Password</label>
					<div
						class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
						<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
							<img src="{{ asset('assets/images/icons/lock.svg') }}" class="h-full w-full object-contain" alt="icon">
						</div>
						<input type="password"
							class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
							placeholder="Write your correct input here" name="password" required>
					</div>
					<x-input-error :messages="$errors->get('password')" class="mt-2" />
				</div>

				<div class="flex flex-col gap-2">
					<label for="confirm-password" class="font-semibold">Confirm Password</;>
						<div
							class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-1 focus-within:border-[#0A090B]">
							<div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
								<img src="{{ asset('assets/images/icons/lock.svg') }}" class="h-full w-full object-contain" alt="icon">
							</div>
							<input type="password"
								class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none border-0 focus:ring-0"
								placeholder="Write your correct input here" name="confirm-password" required>
						</div>

						<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
				</div>

				<button type="submit"
					class="w-full h-[52px] p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
					Create Account
				</button>
			</form>
		</div>
	</div>

</x-guest-layout>
