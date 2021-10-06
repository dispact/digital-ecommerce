<div {{ $attributes->only('class') }}>
	<label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
		{{ __(ucwords($name)) }}
	</label>
	<div class="mt-1">
		<textarea 
			wire:model.debounce.500ms="{{ $name }}"
			rows="4" 
			class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm 
				border border-gray-300 rounded-md
				@error($name) border-red-500 text-red-900  @enderror"
		></textarea>
		@error($name) 
			<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
		@enderror
	</div>
</div>