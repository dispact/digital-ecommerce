<x-app-layout>
	<div x-data="{
		showReviews: true,
		showFAQ: false,
		showLicense: false,
		loadingPurchase: false,
	
		closeTabs() {
			this.showReviews = false;
			this.showFAQ = false;
			this.showLicense = false;
		},
	
		purchase(id, name, price) {
			this.loadingPurchase = true;
			axios.post('/api/create-session', {
				id: id,
				name: name,
				price: price,
				customerId: '{{ auth()->user()->stripe_id ?? ''}}',
			}, 
			{
				headers: {
					'Access-Control-Allow-Origin' : '*',
				}
			})
			.then(function (response) {
				window.location.href = response.data.url;
			})
			.catch(function (error) {
				window.dispatchEvent(new CustomEvent('flasherror', { detail: error.response.data.message }));
			});
		},
	}"
	>
		<div class="mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
         
			<!-- Product -->
         <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
				
				<!-- Product image -->
				<div class="lg:row-end-1 lg:col-span-4">
					<div class="aspect-w-4 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden">
						<img 
						@if(str_contains($product->image, 'http'))
							src="{{ $product->image }}"
						@else
							src="{{ env('APP_URL') . '/' . $product->image }}" 
						@endif
							alt="{{ $product->title }}" 
							class="object-center object-cover"
						>
					</div>
				</div>
     
				<!-- Product details -->
				<div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
             	<div class="flex flex-col-reverse">
						<div class="mt-4">
							<h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $product->title }}</h1>
			
							<h2 id="information-heading" class="sr-only">Product information</h2>
							<p class="text-md text-gray-700 mt-2">
								${{ number_format(($product->price / 100), 2, '.', '') }}
							</p>
							<p class="text-sm text-gray-500 mt-2">
								{{ $product->created_at->format('M d, Y') }}
							</p>
						</div>
     
               	<div>
                 		<h3 class="sr-only">Reviews</h3>
							<div class="flex items-center">
								<!--
									Heroicon name: solid/star
			
									Active: "text-yellow-400", Default: "text-gray-300"
								-->
								<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
			
								<!-- Heroicon name: solid/star -->
								<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
			
								<!-- Heroicon name: solid/star -->
								<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
			
								<!-- Heroicon name: solid/star -->
								<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
			
								<!-- Heroicon name: solid/star -->
								<svg class="text-gray-300 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
							</div>
							<p class="sr-only">4 out of 5 stars</p>
						</div>
					</div>
     
					{{-- Description --}}
					<p class="text-gray-500 mt-6">{{ $product->description }}</p>
	
					{{-- Purchase Button --}}
					<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
						@auth
						<button type="button" x-bind:disabled="loadingPurchase"
							class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center 
								justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none 
								focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
							:class="{ 'opacity-50 cursor-not-allowed' : loadingPurchase }""
							@click="purchase('{{ $product->slug }}', '{{ $product->title }}', {{ $product->price }})"
						>
							<svg x-show="loadingPurchase" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
								xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" x-cloak>
								<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
								<path class="opacity-75" fill="currentColor"
									d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
								</path>
							</svg>
							Purchase
						</button>
						@endauth

						@guest
						<a href="{{ route('login') }}" type="button"
							class="w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center 
								justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none 
								focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
						>
							Log in to Purchase
						</a>
						@endguest
					</div>
	
					{{-- Highlights --}}
					<div class="border-t border-gray-200 mt-10 pt-10">
						<h3 class="text-sm font-medium text-gray-900">Highlights</h3>
						<div class="mt-4 prose prose-sm text-gray-500">
							<ul role="list">
								<li>200+ SVG icons in 3 unique styles</li>
			
								<li>Compatible with Figma, Sketch, and Adobe XD</li>
			
								<li>Drawn on 24 x 24 pixel grid</li>
							</ul>
						</div>
					</div>
	
					{{-- License --}}
					<div class="border-t border-gray-200 mt-10 pt-10">
						<h3 class="text-sm font-medium text-gray-900">License</h3>
						<p class="mt-4 text-sm text-gray-500">For personal and professional use. You cannot resell or redistribute these icons in their original or modified state. <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Read full license</a></p>
					</div>
	
				</div>
     
				<div class="w-full max-w-2xl mx-auto mt-16 lg:max-w-none lg:mt-0 lg:col-span-4">
					<div>
						<div class="border-b border-gray-200">
							<div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
								<!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
								<button @click="closeTabs();showReviews = true;" id="tab-reviews" class="border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="tab-panel-reviews" role="tab" type="button">
									Customer Reviews
								</button>
								<button @click="closeTabs();showFAQ = true;" id="tab-faq" class="border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="tab-panel-faq" role="tab" type="button">
									FAQ
								</button>
								<button @click="closeTabs();showLicense = true;" id="tab-license" class="border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap py-6 border-b-2 font-medium text-sm" aria-controls="tab-panel-license" role="tab" type="button">
									License
								</button>
							</div>
						</div>
	
						<!-- 'Customer Reviews' panel, show/hide based on tab state -->
						<div x-show="showReviews" id="tab-panel-reviews" class="-mb-10" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
							<h3 class="sr-only">Customer Reviews</h3>
		
							<div class="flex text-sm text-gray-500 space-x-4">
								<div class="flex-none py-10">
									<img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="w-10 h-10 bg-gray-100 rounded-full">
								</div>
								<div class="py-10">
									<h3 class="font-medium text-gray-900">Emily Selman</h3>
									<p><time datetime="2021-07-16">July 16, 2021</time></p>
			
									<div class="flex items-center mt-4">
									<!--
										Heroicon name: solid/star
			
										Active: "text-yellow-400", Default: "text-gray-300"
									-->
									<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
			
									<!-- Heroicon name: solid/star -->
									<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
			
									<!-- Heroicon name: solid/star -->
									<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
			
									<!-- Heroicon name: solid/star -->
									<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
			
									<!-- Heroicon name: solid/star -->
									<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
									</div>
									<p class="sr-only">5 out of 5 stars</p>
			
									<div class="mt-4 prose prose-sm max-w-none text-gray-500">
									<p>This icon pack is just what I need for my latest project. There's an icon for just about anything I could ever need. Love the playful look!</p>
									</div>
								</div>
							</div>
		
							<div class="flex text-sm text-gray-500 space-x-4">
								<div class="flex-none py-10">
									<img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="w-10 h-10 bg-gray-100 rounded-full">
								</div>
								<div class="py-10 border-t border-gray-200">
									<h3 class="font-medium text-gray-900">Hector Gibbons</h3>
									<p><time datetime="2021-07-12">July 12, 2021</time></p>
			
									<div class="flex items-center mt-4">
										<!--
											Heroicon name: solid/star
				
											Active: "text-yellow-400", Default: "text-gray-300"
										-->
										<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
										</svg>
				
										<!-- Heroicon name: solid/star -->
										<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
										</svg>
				
										<!-- Heroicon name: solid/star -->
										<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
										</svg>
				
										<!-- Heroicon name: solid/star -->
										<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
										</svg>
				
										<!-- Heroicon name: solid/star -->
										<svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
										</svg>
									</div>
									<p class="sr-only">5 out of 5 stars</p>
			
									<div class="mt-4 prose prose-sm max-w-none text-gray-500">
										<p>Blown away by how polished this icon pack is. Everything looks so consistent and each SVG is optimized out of the box so I can use it directly with confidence. It would take me several hours to create a single icon this good, so it's a steal at this price.</p>
									</div>
								</div>
							</div>
		
						<!-- More reviews... -->
						</div>
	
						<!-- 'FAQ' panel, show/hide based on tab state -->
						<dl x-show="showFAQ" id="tab-panel-faq" class="text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
							<h3 class="sr-only">Frequently Asked Questions</h3>
			
							<dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
							<dd class="mt-2 prose prose-sm max-w-none text-gray-500">
								<p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
							</dd>
			
							<dt class="mt-10 font-medium text-gray-900">Can I use the icons at different sizes?</dt>
							<dd class="mt-2 prose prose-sm max-w-none text-gray-500">
								<p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or larger than 64 x 64 to retain legibility and visual balance.</p>
							</dd>
		
						<!-- More FAQs... -->
						</dl>
	
						<!-- 'License' panel, show/hide based on tab state -->
						<div x-show="showLicense" id="tab-panel-license" class="pt-10" aria-labelledby="tab-license" role="tabpanel" tabindex="0">
							<h3 class="sr-only">License</h3>
			
							<div class="prose prose-sm max-w-none text-gray-500">
								<h4>Overview</h4>
			
								<p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>
			
								<ul role="list">
									<li>You're allowed to use the icons in unlimited projects.</li>
									<li>Attribution is not required to use the icons.</li>
								</ul>
			
								<h4>What you can do with it</h4>
			
								<ul role="list">
									<li>Use them freely in your personal and professional work.</li>
									<li>Make them your own. Change the colors to suit your project or brand.</li>
								</ul>
			
								<h4>What you can't do with it</h4>
			
								<ul role="list">
									<li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>
									<li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>