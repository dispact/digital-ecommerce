<?php

namespace App\Http\Livewire\Product;

use App\Models\Faq;
use App\Models\Product;
use Livewire\Component;
use App\Models\Highlight;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $price;
    public $photo;
    public $file;
    public $slug;
    public $highlight1;
    public $highlight2;
    public $highlight3;
    public $question1;
    public $question2;
    public $question3;
    public $answer1;
    public $answer2;
    public $answer3;

    protected $rules = [
        'title' => 'required|min:6|unique:products,title',
        'description' => 'required|min:25',
        'photo' => 'required|mimes:png,jpg,jpeg,svg',
        'file' => 'required|file|max:10240',
        'price' => 'required|int',
        'highlight1' => 'required|min:6',
        'highlight2' => 'required|min:6',
        'highlight3' => 'required|min:6',
        'answer1' => 'required_unless:question1,null',
        'answer2' => 'required_unless:question2,null',
        'answer3' => 'required_unless:question3,null'
    ];

    protected $messages = [
        'title.required' => 'A title is required',
        'description.required' => 'A description is required',
        'price.required' => 'A price is required',
        'photo.required' => 'A photo is required',
        'file.required' => 'A file is required',
        'highlight1.required' => 'First highlight is required',
        'highlight2.required' => 'Second highlight is required',
        'highlight3.required' => 'Third highlight is required',
        'answer1.required_unless' => 'Answer #1 is required if Question #1 is not blank.',
        'answer2.required_unless' => 'Answer #2 is required if Question #2 is not blank.',
        'answer3.required_unless' => 'Answer #3 is required if Question #3 is not blank.'
    ];

    public function updatingPrice($newValue) {
        $this->price = trim(preg_replace('/[^\p{L}\p{N}\sA-Za-z]/u', '', $newValue));
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function deletePhoto() {
        $this->photo = '';
    }

    public function deleteFile() {
        $this->file = '';
    }

    public function submit() {
        $this->validate();

        $this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title)));

        $s3PhotoPath = Storage::disk('s3')->put('product-images', $this->photo);
        $photo = Storage::disk('s3')->url($s3PhotoPath);
        $file = Storage::disk('s3')->put('product-files', $this->file);
        
        $product = Product::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $photo,
            'file' => $file
        ]);

        $product->highlights()->saveMany([
            new Highlight(['content' => $this->highlight1]),
            new Highlight(['content' => $this->highlight2]),
            new Highlight(['content' => $this->highlight3])
        ]);

        $QAs = [
			[ $this->question1, $this->answer1 ], 
			[ $this->question2, $this->answer2 ],
			[ $this->question3, $this->answer3 ]
		];

        for($i = 0; $i < 3; $i++) {
			if ($QAs[$i][0] && $QAs[$i][1])
                $product->faqs()->save(new Faq(['question' => $QAs[$i][0], 'answer' => $QAs[$i][1]]));
		}  

        return redirect(route('product.show', $this->slug));
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}