<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search;
    public $searchResults = [];

    public function updatedSearch($newValue) {
        if (strlen($this->search) < 3) {
            $this->searchResults = [];

            return;
        }

        $response = Product::filter(['search' => $newValue])->get();
        
        $this->searchResults = $response->toArray();
        
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
