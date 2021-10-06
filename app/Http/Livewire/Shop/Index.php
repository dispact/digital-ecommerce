<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.shop.index', [
            'products' => Product::latest()->paginate(8)
        ]);
    }
}
