<?php

namespace App\Livewire;

use Livewire\Component;

class SelectCountry extends Component
{
    public $viewData;

    public function mount($viewData)
    {
        $this->viewData=$viewData;
    }

    public function render()
    {
        return view('livewire.select-country');
    }
}
