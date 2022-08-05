<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class PaymentList extends Component
{
    public $showFilter = false;
    public $year, $selectDate;

    public function render()
    {
        $data = Payment::whereYear('payment_date',$this->year)->orWhere('payment_date',$this->selectDate)->get();
        return view('livewire.payment-list', compact('data'));
    }
}
