<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Payment as ModelsPayment;
use Livewire\Component;
use Livewire\WithPagination;

class Payment extends Component
{
    public $member_id, $amount, $payment_date, $note, $paginateValue = 10, $deleteId;
    protected $rules = [
        'member_id' => 'required',
        'amount' => 'required',
        'payment_date' => 'required',
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = ModelsPayment::orderBy('id', 'DESC')->paginate($this->paginateValue);
        return view('livewire.payment', compact('data'));
    }

    public function store()
    {
        $this->validate();
        $id = Member::find($this->member_id);
        if ($id == null) {
            dd('not found');
        }
        ModelsPayment::create($this->all());
        session()->flash('success', 'Successfully Member Attendance');
    }

    public function deletePayment($id)
    {
        $this->deleteId = $id;
    }

    public function deletePaymentInfo()
    {
        ModelsPayment::where('id', $this->deleteId)->delete();
        $this->emit('closeModel');
        session()->flash('danger', 'Successfully Payment Deleted');
    }
}
