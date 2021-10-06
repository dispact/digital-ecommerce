<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh',
        'deleteProduct' => 'deleteProduct'
    ];

    public function deleteProduct($id) {
        dd($id);
    }

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::latest()->paginate(10)
        ]);
    }
}
