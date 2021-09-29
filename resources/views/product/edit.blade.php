<x-app-layout>
    <main class="flex-1 overflow-y-auto focus:outline-none">
         <div class="relative max-w-5xl mx-auto md:px-8 xl:px-0">
          @livewire('product.edit', [ 'product' => $product ])
       </div>
    </main>
 </x-app-layout>