<div class="relative group">
   <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden bg-gray-100">
      <x-product.image :product="$product" class="object-center object-cover"/>
      <div class="flex items-end opacity-0 p-4 group-hover:opacity-100" aria-hidden="true">
         <div class="w-full bg-white bg-opacity-75 backdrop-filter backdrop-blur 
            py-2 px-4 rounded-md text-sm font-medium text-gray-900 text-center"
         >
            View Product
         </div>
      </div>
   </div>
   <div class="mt-4 flex items-center justify-between text-base font-medium text-gray-900 space-x-8">
      <h3>
         <a href="{{ route('product.show', $product->slug) }}">
            <span aria-hidden="true" class="absolute inset-0"></span>
            {{ $product->title }}
         </a>
      </h3>
      <p>
         <x-product.price :price="$product->price"/>
      </p>
   </div>
   <div class="flex flex-inline">
      @for($i = 1; $i < 6; $i++)
         <svg class="@if($product->reviews->median('stars') >= $i) text-yellow-400 @else text-gray-200 @endif 
            h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
         >
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
         </svg>
      @endfor
   </div>
</div>