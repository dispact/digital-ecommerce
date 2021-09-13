<div class="relative group">
   <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden bg-gray-100">
      <img 
         src="{{ $product->image }}" 
         alt="Payment application dashboard screenshot with transaction table, financial highlights, and main clients on colorful purple background." 
         class="object-center object-cover"
      >
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
         <a href="{{ route('product.show', $product->id) }}">
            <span aria-hidden="true" class="absolute inset-0"></span>
            {{ $product->title }}
         </a>
      </h3>
      <p>${{ number_format(($product->price / 100), 2, '.', '') }}</p>
   </div>
   <p class="mt-1 text-sm text-gray-500">
      UI Kit
   </p>
</div>