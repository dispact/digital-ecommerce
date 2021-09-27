	<div class="mt-10">
		<div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
			<div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
				<h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Order history</h1>
			</div>
		</div>

		<div class="mt-4">
			<h2 class="sr-only">Recent orders</h2>
			<div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
				<div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
					@foreach($orders as $order)
					<div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border"
						x-data="{ show: false }"
					>
						<h3 class="sr-only">Order placed on <time datetime="2021-07-06">Jul 6, 2021</time></h3>

						<div class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
							<dl class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
							<div>
								<dt class="font-medium text-gray-900">Order number</dt>
								<dd class="mt-1 text-gray-500">
									WU88191111
								</dd>
							</div>
							<div class="hidden sm:block">
								<dt class="font-medium text-gray-900">Date placed</dt>
								<dd class="mt-1 text-gray-500">
									<time datetime="2021-07-06">{{ $order->created_at->format('M d, Y') }}</time>
								</dd>
							</div>
							<div>
								<dt class="font-medium text-gray-900">Total amount</dt>
								<dd class="mt-1 font-medium text-gray-900">
									${{ $order->product->price / 100 }}
								</dd>
							</div>
							</dl>

							<div class="relative flex justify-end lg:hidden">
								<div class="flex items-center">
									<button @click="show = !show" @click.away="show = false" type="button" class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
										<span class="sr-only">Options for order WU88191111</span>
										<!-- Heroicon name: outline/dots-vertical -->
										<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
										</svg>
									</button>
								</div>

								<!--
									Dropdown menu, show/hide based on menu state.

									Entering: "transition ease-out duration-100"
										From: "transform opacity-0 scale-95"
										To: "transform opacity-100 scale-100"
									Leaving: "transition ease-in duration-75"
										From: "transform opacity-100 scale-100"
										To: "transform opacity-0 scale-95"
								-->
								<div class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
									role="menu" 
									aria-orientation="vertical" 
									aria-labelledby="menu-0-button" 
									tabindex="-1"
									x-show="show" 
									x-transition:enter="transition ease-out duration-100"
									x-transition:enter-start="transform opacity-0 scale-95"
									x-transition:enter-end="transform opacity-100 scale-100"
									x-transition:leave="transition ease-in duration-75"
									x-transition:leave-start="transform opacity-100 scale-100"
									x-transition:leave-end="transform opacity-0 scale-95"
								>
									<div class="py-1" role="none">
										<!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
										<a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">
											View Product
										</a>
										{{-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">
											Invoice
										</a> --}}
									</div>
								</div>
							</div>

							<div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
								<a href="#" class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
									<span>Download Product</span>
									<span class="sr-only">WU88191111</span>
								</a>
								{{-- <a href="#" class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
									<span>View Invoice</span>
									<span class="sr-only">for order WU88191111</span>
								</a> --}}
							</div>
						</div>

						<!-- Products -->
						<h4 class="sr-only">Items</h4>
						<ul role="list" class="divide-y divide-gray-200">
							<li class="p-4 sm:p-6">
							<div class="flex items-center sm:items-start">
								<div class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-40 sm:h-40">
									<img src="{{ $order->product->image }}" alt="{{ $order->product->title }}" class="w-full h-full object-center object-cover">
								</div>
								<div class="flex-1 ml-6 text-sm">
									<div class="font-medium text-gray-900 sm:flex sm:justify-between">
									<h5>
										<a class="hover:pointer hover:text-gray-500" href="{{ route('product.show', $order->product->slug) }}">
											{{ $order->product->title }}
										</a>
									</h5>
									<p class="mt-2 sm:mt-0">
										${{ $order->product->price / 100 }}
									</p>
									</div>
									<p class="hidden text-gray-500 sm:block sm:mt-2">
										{{ $order->product->description }}
									</p>
								</div>
							</div>

							<div class="mt-6 sm:flex sm:justify-end hidden">
								<div class="mt-6 border-t border-gray-200 pt-4 flex items-center space-x-4 divide-x divide-gray-200 text-sm font-medium sm:mt-0 sm:ml-4 sm:border-none sm:pt-0">
									<a href="{{ route('product.show', $order->product->slug) }}" class="text-indigo-600 whitespace-nowrap hover:text-indigo-500">
										View product
									</a>
								</div>
							</div>
							</li>

							<!-- More products... -->
						</ul>
					</div>
					@endforeach

				<!-- More orders... -->
				</div>
			</div>
		</div>
	</div>
