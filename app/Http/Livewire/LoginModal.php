<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginModal extends Component
{

    public $email;
    public $password;

    public function submit() {

    }

    public function render()
    {
        return view('livewire.login-modal');
    }
}
