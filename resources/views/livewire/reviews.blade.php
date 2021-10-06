<div>
	<h3 class="sr-only">Customer Reviews</h3>

	@auth
		@if(auth()->user()->hasOrderedProduct($product->id) && !auth()->user()->hasReviewedProduct($product->id))
			<h3 class="text-gray-700 hover:text-gray-800 mt-4 font-medium text-sm">
				Leave a Review
			</h3>
			@livewire('review-form', ['product' => $product])
		@endif
	@endauth

	<div class="divide-y divide-gray-200">
		@forelse($reviews as $review)
		<div class="flex text-sm text-gray-500 space-x-4">
			<div class="flex-none py-10">
				<img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" class="w-10 h-10 bg-gray-100 rounded-full">
			</div>
			<div class="py-10">
				<h3 class="font-medium text-gray-900">{{ $review->user->name }}</h3>
				<p>
					<time datetime="{{ $review->created_at->format('Y-m-d') }}">
						{{ $review->created_at->format('M d, Y') }}
					</time>
				</p>

				<div class="flex items-center mt-1">
					@for($i = 1; $i < 6; $i++)
					<svg class="@if($review->stars >= $i) text-yellow-400 @else text-gray-200 @endif 
						h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
					>
						<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
					</svg>
					@endfor
				</div>
				<p class="sr-only">{{ $review->stars }} out of 5 stars</p>

				<div class="mt-4 prose prose-sm max-w-none text-gray-500">
					<p>{{ $review->content }}</p>
				</div>
			</div>
		</div>
		@empty
			<p class="mt-4 text-sm">There are currently no reviews</p>
		@endforelse
	</div>
</div>