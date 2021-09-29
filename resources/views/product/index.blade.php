<x-app-layout>
	@livewire('product.index')
	@livewire('modal.delete-product', [
		'title' => 'Delete Product',
		'message' => 'Are you sure you want to delete this product?',
		'confirmText' => 'Delete'
	])
</x-app-layout>