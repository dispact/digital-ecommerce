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
	
				<div class="sm:col-span-6" x-data="{photoName: null, photoPreview: null}">
					<label for="cover-photo" class="block text-sm font-medium text-gray-700">
						Photo
					</label>
					<div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md
						@error('photo') border-red-500 @enderror"
					>
						<div class="space-y-1 text-center">
							<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
								<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							<div class="flex text-sm text-gray-600">
								<label for="photo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
								<span>Upload a file</span>
								<input 
									wire:model="photo"
									id="photo" 
									name="photo" 
									type="file" 
									class="sr-only"
									
								>
								</label>
								<p class="pl-1">or drag and drop</p>
							</div>
							<p class="text-xs text-gray-500">
								PNG, JPG, GIF up to 10MB
							</p>
						</div>
					</div>
					@error('photo') 
						<p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
					@enderror
					@if ($photo)
					<div>
						<p class="block mt-2 text-sm font-medium text-gray-700">
							Photo Preview
						</p>
						<img src="{{ $photo->temporaryUrl() }}">
					</div>
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
