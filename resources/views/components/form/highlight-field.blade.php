<input class="flex-1 min-w-0 block w-full px-3 py-2 rounded-md focus:ring-indigo-500 
		focus:border-indigo-500 sm:text-sm border-gray-300
		@error($name) border-red-500 text-red-900 @enderror"
	type="text" 
	wire:model="{{ $name }}"
	{{ $attributes }}
>
@error($name) 
	<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
@enderror