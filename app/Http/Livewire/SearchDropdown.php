<?php

namespace App\Http\Livewire;

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

        $response = Http::get('localhost:8001/api/products?search=' . $this->search);

        $this->searchResults = $response->json();
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
