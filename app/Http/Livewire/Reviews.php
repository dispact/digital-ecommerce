<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\Product;
use Livewire\Component;

class Reviews extends Component
{
    public $product;

    protected $listeners = ['refreshReviews' => '$refresh'];

    public function mount(Product $product) {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.reviews', [
            'reviews' => Review::where('product_id', $this->product->id)
                ->latest()
                ->with(['user'])
                ->paginate(5)
        ]);
    }
}
