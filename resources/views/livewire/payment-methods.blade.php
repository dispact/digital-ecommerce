{{-- <form wire:submit.prevent="submit" class="w-1/4">
    <legend class="block text-md font-medium text-gray-700">Add Card</legend>
    <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px">
        <div>
            <label for="card-number" class="sr-only">Card number</label>
            <input type="text" name="card-number" id="card-number" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="Card number">
        </div>
        <div class="flex -space-x-px">
            <div class="w-1/2 flex-1 min-w-0">
                <label for="card-expiration-date" class="sr-only">Expiration date</label>
                <input type="text" name="card-expiration-date" id="card-expiration-date" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-bl-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="MM / YY">
            </div>
            <div class="flex-1 min-w-0">
                <label for="card-cvc" class="sr-only">CVC</label>
                <input type="text" name="card-cvc" id="card-cvc" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-br-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="CVC">
            </div>
        </div>
    </div>
    <x-jet-button class="mt-2">
        {{ __('Add Card') }}
    </x-jet-button>
</form> --}}


@foreach($paymentMethods as $paymentMethod)
<div class="mt-4">
    <div wire:click="deleteCard('{{ $paymentMethod['id'] }}')" class="max-w-md text-gray-100 border rounded-lg overflow-hidden md:max-w-sm
        hover:bg-red-400 hover:cursor-pointer hover:scale-105
        @if($paymentMethod['card']['brand'] == 'visa') bg-blue-400
        @elseif($paymentMethod['card']['brand'] == 'mastercard') bg-green-400
        @else bg-purple-300
        @endif"
    >
        <div class="md:flex">
            <div class="w-full p-4">
                <div class="flex justify-end items-center">
                    <span class="text-xl font-bold">
                        {{ ucwords($paymentMethod['card']['brand']) }}
                    </span>
                </div>
                <div class="flex justify-between items-center"></div>
                <div class="flex justify-between items-center mt-10">
                    <div class="flex flex-row">****</div>
                    <div class="flex flex-row">****</div>
                    <div class="flex flex-row">****</div>
                    <div class="flex flex-row"> 
                        <span class="text-lg mr-1 font-bold">
                            {{ $paymentMethod['card']['last4'] }}
                        </span> 
                    </div>
                </div>
                <div class="mt-8 flex justify-between items-center text-white">
                    <div class="flex flex-col"> 
                        <span class="font-bold text-gray-700 text-sm">
                            Name
                        </span> 
                        <span class="font-bold">
                            {{ $paymentMethod['billing_details']['name'] }}
                        </span>
                    </div>
                    <div class="flex flex-col"> 
                        <span class="font-bold text-gray-600 text-sm">
                            Expires
                            </span> 
                        <span class="font-bold">
                            {{ $paymentMethod['card']['exp_month'] }}/{{ $paymentMethod['card']['exp_year'] }}
                        </span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<button type="button" class="relative block w-1/3 border-2 mt-4 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg>
    <span class="mt-2 block text-sm font-medium text-gray-900">
        Add a new payment method
    </span>
</button>