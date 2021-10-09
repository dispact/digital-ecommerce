<?php

namespace App\Http\Livewire\Product;

use App\Models\Faq;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
	use WithFileUploads;

	public $id_;
	public $title;
	public $description;
	public $price;
	public $photo;
	public $file;
	public $slug;
	public $product;
	public $highlight1;
	public $highlight2;
	public $highlight3;
	public $question1;
	public $question2;
	public $question3;
	public $answer1;
	public $answer2;
	public $answer3;

	public function rules() {
		return [
			'title' => 'required|min:6|unique:products,title,' . $this->id_,
			'description' => 'required|min:25',
			'price' => 'required|int',
			'highlight1' => 'required|min:6',
			'highlight2' => 'required|min:6',
			'highlight3' => 'required|min:6',
			'answer1' => 'required_unless:question1,null',
			'answer2' => 'required_unless:question2,null',
			'answer3' => 'required_unless:question3,null'
		];
	}

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
	
	public function mount(Product $product) {
		$this->id_ = $product->id;
		$this->product = $product;
		$this->title = $product->title;
		$this->description = $product->description;
		$this->price = $product->price;
		$this->photo = $product->image;
		$this->file = $product->file;

		$this->highlight1 = $product->highlights[0]->content;
		$this->highlight2 = $product->highlights[1]->content;
		$this->highlight3 = $product->highlights[2]->content;

		if (array_key_exists(0, $product->faqs->toArray())) {
			$this->question1 = $product->faqs[0]->question;
			$this->answer1 = $product->faqs[0]->answer;
		}
		if (array_key_exists(1, $product->faqs->toArray())) {
			$this->question2 = $product->faqs[1]->question;
			$this->answer2 = $product->faqs[1]->answer;
		}
		if (array_key_exists(2, $product->faqs->toArray())) {
			$this->question3 = $product->faqs[2]->question;
			$this->answer3 = $product->faqs[2]->answer;
		}
	}

	public function deletePhoto() {
		$this->photo = '';
	}

	public function deleteFile() {
		$this->file = '';
	}

	public function submit() {
		$this->validate();

		if ($this->photo != $this->product->image || $this->photo == '')
			$this->validate(['photo' => 'required|mimes:png,jpg,jpeg,svg']);

		if ($this->file != $this->product->file || $this->file == '')
			$this->validate(['file' => 'required|file|max:10240']);

		if (!$this->title == $this->product->title)
			$this->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title)));
		else
			$this->slug = $this->product->slug;

		$this->product->title = $this->title;
		$this->product->description = $this->description;
		$this->product->price = $this->price;
		if (is_object($this->photo)) {
			Storage::disk('s3')->delete($this->product->image);
			$path = Storage::disk('s3')->put('product-images', $this->photo);
			$this->photo = Storage::disk('s3')->url($path);
		}
		if (is_object($this->file)) {
			Storage::disk('s3')->delete($this->product->file);
			$path = Storage::disk('s3')->put('product-files', $this->file);
			$this->file = $path;
		}
		$this->product->image = $this->photo;
		$this->product->file = $this->file;
		$this->product->highlights[0]->content = $this->highlight1;
		$this->product->highlights[1]->content = $this->highlight2;
		$this->product->highlights[2]->content = $this->highlight3;

		$QAs = [
			[ $this->question1, $this->answer1 ], 
			[ $this->question2, $this->answer2 ],
			[ $this->question3, $this->answer3 ]
		];

		for($i = 0; $i < 3; $i++) {
			if ($QAs[$i][0] && $QAs[$i][1]) {
				if (array_key_exists($i, $this->product->faqs->toArray())) {
					$this->product->faqs[$i]->question = $QAs[$i][0];
					$this->product->faqs[$i]->answer = $QAs[$i][1];
				} else {
					$this->product->faqs()->save(new Faq(['question' => $QAs[$i][0], 'answer' => $QAs[$i][1]]));
				}
			}
		}  
		
		$this->product->push();

		return redirect(route('product.index'));
	}

	public function render()
	{
		return view('livewire.product.edit');
	}
}
