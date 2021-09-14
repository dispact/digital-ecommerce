<x-app-layout>
    <div>
        <div class="max-w-2xl mx-auto py-4 px-4 sm:py-12 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
                @foreach($products as $product)
                    <x-product :product="$product"/>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $products->links() }}
        </div>
        </div>
    </div>
</x-app-layout>