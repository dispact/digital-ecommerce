<div class="md:p-0 p-4">
	<form wire:submit.prevent="submit" class="mt-8 space-y-8 divide-y divide-gray-200">
		<div class="space-y-8 divide-y divide-gray-200">
			<div>
			<div>
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					New Product
				</h3>
			</div>
	
			<div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
				
				<div class="sm:col-span-6">
					<label for="title" class="block text-sm font-medium text-gray-700">
						Title
					</label>
					<div class="mt-1">
						<input 
							wire:model.debounce.500ms="title"
							type="text" 
							name="slug" 
							id="slug" 
							class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 
								rounded-md sm:text-sm border-gray-300
								@error('title') border-red-500 text-red-900 @enderror"
						>
						@error('title') 
							<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
						@enderror
					</div>
				</div>
	
				<div class="sm:col-span-6">
					<label for="description" class="block text-sm font-medium text-gray-700">
						Description
					</label>
					<div class="mt-1">
						<textarea 
							wire:model.debounce.500ms="description"
							id="description" 
							name="description" 
							rows="4" 
							class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm 
								border border-gray-300 rounded-md
								@error('description') border-red-500 text-red-900  @enderror"
						></textarea>
						@error('description') 
							<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
						@enderror
					</div>
				</div>

				<div class="sm:col-span-6 md:col-span-1">
					<label for="price" class="block text-sm font-medium text-gray-700">Price</label>
					<div class="mt-1 relative rounded-md shadow-sm">
						<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
							<span class="text-gray-500 sm:text-sm">
								$
							</span>
						</div>
						<input 
							wire:model.debounce.500ms="price"
							type="text" 
							name="price" 
							id="price" 
							class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 
								sm:text-sm border-gray-300 rounded-md
								@error('price') border-red-500 text-red-900 @enderror" 
							placeholder="2499" 
							aria-describedby="price-currency"
						>
						<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
							<span class="text-gray-500 sm:text-sm" id="price-currency">
								USD
							</span>
						</div>
					</div>
					@error('price') 
						<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
					@enderror
				 </div>

				<div class="sm:col-span-6" x-data>
					<label for="cover-photo" class="block text-sm font-medium text-gray-700">
						Photo
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
                    
                        <img src="{{ $photo->temporaryUrl() }}"
                            class="mt-4 rounded-md"
                        >
                    @endif
				</div>
			</div>
		</div>

		<div class="pt-5">
			<div class="flex justify-end">
			<button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
				Cancel
			</button>
			<button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
				Create
			</button>
			</div>
		</div>
	</form>
</div>
