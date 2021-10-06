<div class="bg-white" x-data="{
   showSearch: false
}
">
   <header class="relative bg-white">
      <nav aria-label="Top" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div
            class="border-b border-gray-200 px-4 pb-14 sm:px-0 sm:pb-0"
         >
            <div class="h-16 flex items-center justify-between">
               <!-- Logo -->
               <div class="flex-1 flex items-center">
                  {{-- <a href="{{ route('product.index') }}">
                     <x-jet-application-mark class="block h-9 w-auto" />
                  </a> --}}
               </div>

               <!-- Navigation Links -->
               <div class="absolute bottom-0 inset-x-0 sm:static sm:flex-1 sm:self-stretch">
                  <div
                     class="border-t h-14 px-4 flex space-x-8 overflow-x-auto pb-px 
                        sm:h-full sm:border-t-0 sm:justify-center sm:overflow-visible sm:pb-0"
                  >
                     <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                     <a href="{{ route('shop.index') }}"
                        class="border-transparent relative z-10 
                           flex items-center transition-colors ease-out duration-200 text-sm font-medium 
                           border-b-2 -mb-px pt-px 
                           @if(request()->route()->named('shop.index')) 
                              border-indigo-600 text-indigo-600 hover:text-indigo-400
                           @else 
                              border-transparent text-gray-700 hover:text-gray-400 
                           @endif"
                     >
                        Shop
                     </a>

                     @role('admin')
                     <a href="{{ route('product.index') }}"
                        class="border-transparent relative z-10 
                           flex items-center transition-colors ease-out duration-200 text-sm font-medium 
                           border-b-2 -mb-px pt-px 
                           @if(request()->route()->named('product.index')) 
                              border-indigo-600 text-indigo-600 hover:text-indigo-400
                           @else 
                              border-transparent text-gray-700 hover:text-gray-400 
                           @endif"
                     >
                        Manage
                     </a>
                     @endrole
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
                  
                  <!-- Search Dropdown -->
                  <livewire:search-dropdown/>
               
                  <!-- Settings Dropdown -->
                  @auth
                  <div class="ml-3 relative">
                     <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                           @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                              <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none 
                                 focus:border-gray-300 transition"
                              >
                                    <img 
                                       class="h-8 w-8 rounded-full object-cover" 
                                       src="{{ Auth::user()->profile_photo_url }}" 
                                       alt="{{ Auth::user()->name }}" 
                                    />
                              </button>
                           @else
                              <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent
                                       text-sm leading-4 font-medium rounded-md text-gray-500 bg-white 
                                       hover:text-gray-700 focus:outline-none transition"
                                    >
                                       {{ Auth::user()->name }}
                                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                       </svg>
                                    </button>
                              </span>
                           @endif
                        </x-slot>

                        <x-slot name="content">
                           <x-jet-dropdown-link href="{{ route('order.history') }}">
                              {{ __('Order History') }}
                           </x-jet-dropdown-link>

                           <x-jet-dropdown-link href="{{ route('profile.show') }}">
                              {{ __('Profile') }}
                           </x-jet-dropdown-link>

                           @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                              <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                              </x-jet-dropdown-link>
                           @endif

                           <div class="border-t border-gray-100"></div>

                           <!-- Authentication -->
                           <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <x-jet-dropdown-link 
                                 href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); this.closest('form').submit();"
                              >
                                 {{ __('Log Out') }}
                              </x-jet-dropdown-link>
                           </form>
                        </x-slot>
                     </x-jet-dropdown>
                  </div>

                  @else
                  <a href="{{ route('login') }}"
                     class="ml-6 bg-indigo-600 border border-transparent rounded-md py-2 px-4 font-medium 
                        text-white hover:bg-indigo-700 focus:outline-none text-sm
                        focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                  >
                     Log in
                  </a>
                  @endauth
               </div>
            </div>
         </div>
      </nav>
   </header>
</div>