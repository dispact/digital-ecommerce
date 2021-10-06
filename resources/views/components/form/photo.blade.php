<div {{ $attributes->only('class') }} x-data>
	<label for="cover-photo" class="block text-sm font-medium text-gray-700">
		{{ __('Photo') }}
	</label>
	<input class="hidden" 
		type="file"   
		accept="image/*" 
		wire:model="photo"
		x-ref="photo"
	/>
			
	<x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
		<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
				wire:loading wire:target="photo"
		>
			<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
			<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
		</svg>
		{{ __('Select A Photo') }}
	</x-jet-secondary-button>

	@error('photo') 
		<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
	@enderror

	@if ($photo)
		<x-jet-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
			{{ __('Remove Photo') }}
		</x-jet-secondary-button>

	<img
		@if($type == 'create')
			src="{{ $photo->temporaryUrl() }}"
		@elseif($type == 'edit')
			src="{{ is_object($photo) ? $photo->temporaryUrl() : 
				(str_contains($photo, 'http') ? $photo : Storage::url($photo))
			}}"
		@endif
			class="mt-4 rounded-md"
	>
		@endif
</div>