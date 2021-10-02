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
    public $highlight1;
    public $highlight2;
    public $highlight3;

    public function rules() {
        return [
            'title' => 'required|min:6|unique:products,title,' . $this->id_,
            'description' => 'required|min:25',
            'price' => 'required|int',
            'photo' => 'required|image',
            'highlight1' => 'required|min:6',
            'highlight2' => 'required|min:6',
            'highlight3' => 'required|min:6'
        ];
    }

    public function messages() {
        return [
            'highlight1.required' => 'First highlight is required',
            'highlight2.required' => 'Second highlight is required',
            'highlight3.required' => 'Third highlight is required'
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
        $this->highlight1 = $product->highlights[0]->content;
        $this->highlight2 = $product->highlights[1]->content;
        $this->highlight3 = $product->highlights[2]->content;
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
        $this->product->highlights[0]->content = $this->highlight1;
        $this->product->highlights[1]->content = $this->highlight2;
        $this->product->highlights[2]->content = $this->highlight3;
        $this->product->push();

        return redirect(route('product.index'));
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}
