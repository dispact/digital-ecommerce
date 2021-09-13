<!-- This example requires Tailwind CSS v2.0+ -->
<div x-data="{ show: false, message: '' }" 
   x-show="show" 
   @flashsuccess.window="
      show = true;
      message = $event.detail
      setTimeout(() => show = false, 1000);
   "
   class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
     <!--
       Background overlay, show/hide based on modal state.
 
       Entering: "ease-out duration-300"
         From: "opacity-0"
         To: "opacity-100"
       Leaving: "ease-in duration-200"
         From: "opacity-100"
         To: "opacity-0"
     -->
     <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
 
     <!-- This element is to trick the browser into centering the modal contents. -->
     <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
 
     <!--
       Modal panel, show/hide based on modal state.
 
       Entering: "ease-out duration-300"
         From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         To: "opacity-100 translate-y-0 sm:scale-100"
       Leaving: "ease-in duration-200"
         From: "opacity-100 translate-y-0 sm:scale-100"
         To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
     -->
     <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
       <div>
         <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
           <!-- Heroicon name: outline/check -->
           <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
           </svg>
         </div>
         <div class="mt-3 text-center sm:mt-5">
           <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-text="message">
           </h3>
         </div>
       </div>
     </div>
   </div>
 </div>
 