<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $price;
    public $photo;
    public $slug;

    protected $rules = [
        'title' => 'required|min:6|unique:products,title',
        'description' => 'required|min:25',
        'photo' => 'required|image',
        'price' => 'required|int'
    ];

    public function updatingPrice($newValue) {
        $this->price = trim(preg_replace('/[^\p{L}\p{N}\sA-Za-z]/u', '', $newValue));
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function submit() {
        $this->validate();

        $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title)));

        $this->photo->storeAs('public/product-photos', $this->slug . '.jpg');

        Product::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->slug . '.jpg'
        ]);

        return redirect(route('product.show', $this->slug));
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
