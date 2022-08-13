<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentList extends Component
{
    public $showFilter = false;
    public $year, $selectDate, $getId, $paginateValue;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Payment::whereYear('payment_date', $this->year)
            ->orWhere('payment_date', $this->selectDate)
            ->orderBy('id', "DESC")
            ->paginate($this->paginateValue);
        return view('livewire.payment-list', compact('data'));
    }

    public function getDeleteId($var)
    {
        $this->getId = $var;
    }

    public function deletePayment()
    {
        Payment::where('id', $this->getId)->delete();
        $this->emit('closeModel');
        session()->flash('danger', 'Successfully Deleted');
    }
}
