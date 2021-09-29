<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use Livewire\Component;
use App\Http\Livewire\Modal\Base;
use Illuminate\Support\Facades\Storage;

class DeleteProduct extends Base
{
    public $title;
    public $message;
    public $confirmText;
    public $productId;

    protected $listeners = [
        'modalToggled' => 'modalToggled',
    ];

    public function mount() {
        $this->productId = '';
    }

    public function modalToggled($id) {
        $this->productId = $id;
    }

    public function deleteProduct() {
        $this->emit('toggleModal');
        try {
            $product = Product::find($this->productId);
            Storage::disk('public')->delete($product->image);
            $product->delete();
            $this->emitTo('product.index', 'refreshComponent');
            $this->dispatchBrowserEvent('results-modal', [ 'type' => 'success', 'title' => 'Product Deleted' ]);
        } catch (\exception $e) {
            $this->dispatchBrowserEvent('results-modal', [ 'type' => 'error', 'title' => 'Error deleting product' ]);
        }
    }

    public function render()
    {
        return view('livewire.modal.delete-product');
    }
}
