<?php 
	$stringNumber = new NumberFormatter("en", NumberFormatter::SPELLOUT);
?>
<div>
	<label for="question{{ $number }}" class="text-xs">
		{{ __('Question #' . $number) }}
	</label>
	<input class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md focus:ring-indigo-500 
			focus:border-indigo-500 sm:text-sm border-gray-300
			@error('question'.$number) border-red-500 text-red-900 @enderror"
		type="text" 
		wire:model="question{{ $number }}"
		placeholder="Question {{ $stringNumber->format($number) }}"
	>
	@error('question{{ $number }}') 
		<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
	@enderror

	<label for="answer{{ $number }}" class="text-xs">
		Answer #{{ $number }}
	</label>
	<input class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md focus:ring-indigo-500 
			focus:border-indigo-500 sm:text-sm border-gray-300
			@error('answer' . $number) border-red-500 text-red-900 @enderror"
		type="text" 
		wire:model="answer{{ $number }}"
		placeholder="Answer {{ $stringNumber->format($number) }}"
	>
	@error('answer' . $number) 
		<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
	@enderror
</div>