<div class="md:p-0 p-4">
	<form wire:submit.prevent="submit" class="mt-8 space-y-8 divide-y divide-gray-200">
		<div class="space-y-8 divide-y divide-gray-200">
			<div>
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					{{ $heading }}
				</h3>
	
				<div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
					<x-form.textfield 
						class="sm:col-span-6"
						name="title" 
					/>
	
					<x-form.textarea 
						class="sm:col-span-6" 
						name="description"
					/>
				
					<x-form.price 
						class="sm:col-span-6 md:col-span-1"
					/>
			
					<x-form.photo 
						class="sm:col-span-6"
						:photo="$photo" 
						:type="$type" 
					/>

					<x-form.file 
						class="sm:col-span-6"
						:file="$file" 
					/>
				</div>
			</div>

			<div>
				<h3 class="text-md leading-6 font-medium text-gray-900 mt-4 mb-4">
					Highlights
				</h3>
				<div class="space-y-2">
					<x-form.highlight-field 
						name="highlight1" 
						placeholder="First highlight here..."
					/>
					<x-form.highlight-field 
						name="highlight2" 
						placeholder="Second highlight here..."
					/>
					<x-form.highlight-field 
						name="highlight3" 
						placeholder="Third highlight here..."
					/>
				 </div>
			</div>

			<div>
				<h3 class="text-md leading-6 font-medium text-gray-900 mt-4 mb-4">
					Frequently Asked Questions
				</h3>
				<div class="space-y-4">
					<x-form.faq-field 
						number="1" 
					/>
					<x-form.faq-field 
						number="2" 
					/>
					<x-form.faq-field 
						number="3" 
					/>
				</div>
			</div>
		</div>

		<div class="pt-5 pb-5">
			<div class="flex justify-end">
				<a class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 
						focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
					href="{{ route('product.index') }}"
				>
					Cancel
				</a>
				<button class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md 
						text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
					type="submit" 
				>
					@if($type=="create")
						Create
					@elseif($type=="edit")
						Update
					@endif
				</button>
			</div>
		</div>
	</form>
</div>
