<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderHistory extends Component
{
    public $orders;

    public function mount() {
        $this->orders = Order::latest()->where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.order-history');
    }
}
