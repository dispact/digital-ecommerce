<div {{ $attributes->only('class') }}>
	<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
		{{ __(ucwords($name)) }}
	</label>
	<div class="mt-1">
		<input 
			class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 
					rounded-md sm:text-sm border-gray-300
					@error($name) border-red-500 text-red-900 @enderror"
			wire:model.debounce.500ms="{{ $name }}"
			type="text"
			{{ $attributes }} 
		>
		@error($name) 
			<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
		@enderror
	</div>
</div>