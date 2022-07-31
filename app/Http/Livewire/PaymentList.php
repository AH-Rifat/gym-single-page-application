<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaymentList extends Component
{
    public $showFilter = false;

    public function render()
    {
        return view('livewire.payment-list');
    }
}
