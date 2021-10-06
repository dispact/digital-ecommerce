<?php

namespace App\Http\Livewire\Modal;

use Livewire\Component;

class Base extends Component
{
    public $show = false;

    protected function getListeners() {
        return $this->listeners + ['toggleModal' => 'toggleModal'];
    }

    public function toggleModal($params=null)
    {
        $this->show = !$this->show;
        if ($this->show)
            $this->emitSelf('modalToggled', $params);
    }
}