<div {{ $attributes->only('class') }}>
	<label for="price" class="block text-sm font-medium text-gray-700">
		{{ __('Price') }}
	</label>
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