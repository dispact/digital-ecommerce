<?php

namespace App\Http\Livewire;

use App\Models\Review;
use App\Models\Product;
use Livewire\Component;

class ReviewForm extends Component
{
    public $product;
    public $content;
    public $stars;

    protected $rules = [
        'content' => 'required|min:6',
        'stars' => 'required'
    ];

    public function mount(Product $product) {
        $this->product = $product;
        $this->stars = '5';
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function submitReview() {
        $this->product->reviews()->saveMany([
            new Review([
                'content' => $this->content, 
                'stars' => $this->stars,
                'user_id' => auth()->user()->id
            ])
        ]);
        $this->emit('refreshReviews');
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
