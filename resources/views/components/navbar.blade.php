<div class="bg-white" x-data="{
   showSearch: false
}">
   <header class="relative bg-white">
      <nav aria-label="Top" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div
            class="border-b border-gray-200 px-4 pb-14 sm:px-0 sm:pb-0"
         >
            <div class="h-16 flex items-center justify-between">
               <!-- Logo -->
               <div class="flex-1 flex items-center">
                  <a href="{{ route('home') }}">
                     <span class="font-bold">Digital Ecommerce</span>
                  </a>
               </div>

               <!-- Flyout menus -->
               <div class="absolute bottom-0 inset-x-0 sm:static sm:flex-1 sm:self-stretch">
                  <div
                     class="border-t h-14 px-4 flex space-x-8 overflow-x-auto pb-px 
                        sm:h-full sm:border-t-0 sm:justify-center sm:overflow-visible sm:pb-0"
                  >
                     <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                     <a
                        href="{{ route('home') }}"
                        class="border-transparent relative z-10 
                           flex items-center transition-colors ease-out duration-200 text-sm font-medium 
                           border-b-2 -mb-px pt-px 
                           @if(request()->route()->named('home')) 
                              border-indigo-600 text-indigo-600 hover:text-indigo-400
                           @else border-transparent text-gray-700 hover:text-gray-400 @endif"
                     >
                        Products
                     </a>
                  </div>
               </div>

               <div class="flex-1 flex items-center justify-end">
                  <!-- Search -->
                  <button @click="showSearch = !showSearch; $nextTick(() => {console.log($refs.search.focus())})" 
                     x-show="!showSearch" 
                     class="p-2 text-gray-400 hover:text-gray-500"
                  >
                     <span class="sr-only">Search</span>
                     <!-- Heroicon name: outline/search -->
                     <svg
                        class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                     >
                        <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                        />
                     </svg>
                  </button>
                  
                  <livewire:search-dropdown/>

                  <button @click="$dispatch('toggle-login')" 
                     class="ml-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 font-medium 
                        text-white hover:bg-indigo-700 focus:outline-none text-sm
                        focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                     >
                     Log in
                  </button>
               </div>
            </div>
         </div>
      </nav>
   </header>
</div>