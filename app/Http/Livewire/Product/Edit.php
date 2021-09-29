<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id_;
    public $title;
    public $description;
    public $price;
    public $photo;
    public $slug;
    public $product;

    public function rules() {
        return [
            'title' => 'required|min:6|unique:products,title,' . $this->id_,
            'description' => 'required|min:25',
            'price' => 'required|int',
            'photo' => 'required|image'
        ];
    }

    public function updatingPrice($newValue) {
        $this->price = trim(preg_replace('/[^\p{L}\p{N}\sA-Za-z]/u', '', $newValue));
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
    
    public function mount(Product $product) {
        $this->id_ = $product->id;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->photo = $product->image;
        $this->product = $product;
    }

    public function deletePhoto() {
        $this->photo = '';
    }

    public function submit() {
        if (!$this->title == $this->product->title)
            $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title)));
        else
            $this->slug = $this->product->slug;
        $this->product->title = $this->title;
        $this->product->description = $this->description;
        $this->product->price = $this->price;
        if (is_object($this->photo)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete('product-photos/' . $this->slug . '.jpg');
            $this->photo = $this->photo->storePubliclyAs('product-photos', $this->slug . '.jpg', 'public');
        }
        $this->product->image = $this->photo;
        $this->product->save();

        return redirect(route('product.index'));
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
