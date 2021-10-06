<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentMethods extends Component
{
    public $number;
    public $exp_month;
    public $exp_year;
    public $cvc;
    public $paymentMethods;

    public function mount() {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $this->paymentMethods = $stripe->paymentMethods->all([
            'customer' => auth()->user()->stripe_id,
            'type' => 'card',
        ])['data'];
    }

    public function deleteCard($cardId) {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripe->paymentMethods->detach($cardId, []);
    }

    public function render()
    {
        return view('livewire.payment-methods');
    }
}