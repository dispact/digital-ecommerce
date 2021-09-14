<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethods extends Component
{
    public $number;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function submit() {
        //
    }

    public function render()
    {
        return view('livewire.payment-methods');
    }
}