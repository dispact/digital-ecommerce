<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
       {{-- Header --}}
       <div class="max-w-xl">
          <p class="mt-2 text-2xl font-extrabold tracking-tight sm:text-5xl">
             Thank you for your purchase!
          </p>
          <p class="mt-2 text-base text-gray-500">
          Your order has been processed and will be delivered to your email soon.
          </p>
       </div>
 
       {{-- Items --}}
       <div class="mt-10 border-t border-gray-200">
          <div class="py-10 flex space-x-6">
             <img src="{{ $product->image }}" 
                alt="{{ $product->title }}" 
                class="flex-none w-20 h-20 object-center object-cover bg-gray-100 rounded-lg sm:w-40 sm:h-40"
             />
             <div class="flex-auto flex flex-col">
                <h4 class="font-medium text-gray-900">
                   <a href="{{ route('product.show', $product->id) }}">
                      {{ $product->title }}
                   </a>
                </h4>
                <p class="mt-2 text-sm text-gray-600">
                   {{ $product->description }}
                </p>
                
                <div class="mt-6 flex-1 flex items-end">
                   <dl class="text-sm">
                      <div class="flex">
                         <dt class="font-medium text-gray-900">Price</dt>
                         <dd class="ml-2 text-gray-700">
                            ${{ number_format(($product->price / 100), 2, '.', '') }}
                         </dd>
                      </div>
                   </dl>
                </div>  
             </div>
          </div>
       </div>
    </div>
 </x-app-layout>
 
 