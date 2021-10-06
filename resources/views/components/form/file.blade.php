<div {{ $attributes->only('class') }}>
	<label for="cover-photo" class="block text-sm font-medium text-gray-700">
		{{ __('File') }}
	</label>
	<div class="mt-2 sm:col-span-2">
		<svg class="animate-spin -ml-1 mr-3 mb-2 h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
			wire:loading wire:target="file"
		>
			<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
			<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
		</svg>
		@if($file)
			<x-jet-secondary-button type="button" wire:click="deleteFile">
				{{ __('Remove File') }}
			</x-jet-secondary-button>
		@else
			<div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md
				@error('file') border-red-500 @enderror"
			>
				<div class="space-y-1 text-center">
					<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
						<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<div class="flex text-sm text-gray-600">
						<label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
							<span>Upload a file</span>
							<input wire:model="file" name="file" id="file" type="file" class="sr-only">
						</label>
						<p class="pl-1">or drag and drop</p>
					</div>
					<p class="text-xs text-gray-500">
						File size limited to 10MB
					</p>
				</div>
			</div>
		@endif
	</div>
	@error('file') 
		<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
	@enderror
</div>