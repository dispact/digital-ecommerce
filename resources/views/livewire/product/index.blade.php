<main class="flex-1 overflow-y-auto focus:outline-none" x-data>
    <div class="relative max-w-5xl mx-auto md:px-8 xl:px-0">
        <div class="px-4 sm:px-6 md:px-0 mt-6 mb-4 flex justify-between">
            <h1 class="text-3xl font-extrabold text-gray-900">Product Management</h1>
            <a class="bg-gray-50 hover:bg-gray-200 border border-gray-200 
                    rounded-md py-2 px-4 font-medium text-gray-700 text-sm 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 
                    focus:ring-offset-gray-50 focus:ring-indigo-500"
                href="{{ route('product.create') }}"
            >
                Create Product
            </a>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <x-product.image :product="$product" class="h-10 w-10 rounded-sm" />
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $product->title }}
                                        </div>
                                    </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 w-96">
                                        <p class="truncate">{{ $product->description }}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    ${{ $product->price / 100 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('product.edit', $product->slug) }}" class="text-indigo-500 hover:text-indigo-800">
                                        Edit
                                    </a>
                                    <span class="text-gray-300"> | </span>
                                    <button wire:click="$emit('toggleModal', {{ $product->id }})" class="font-medium text-red-500 hover:text-red-800">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
        
                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>