<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Payment as ModelsPayment;
use Livewire\Component;
use Livewire\WithPagination;

class Payment extends Component
{
    public $member_id, $amount, $payment_date, $note, $paginateValue = 10, $paymentId;
    protected $rules = [
        'member_id' => 'required',
        'amount' => 'required',
        'payment_date' => 'required',
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = ModelsPayment::whereYear('payment_date', date('Y'))->orderBy('id', 'DESC')->paginate($this->paginateValue);
        return view('livewire.payment', compact('data'));
    }

    public function store()
    {
        $this->validate();
        $id = Member::find($this->member_id);
        if ($id === null) {
            session()->flash('danger', 'Member Not Found');
            return back();
        }

        $data = ModelsPayment::where('member_id', $this->member_id)->get();
        foreach ($data as $value) {
            if (date('Y-m', strtotime($this->payment_date)) == $value->payment_date->format('Y-m')) {
                session()->flash('danger', 'Member Already Paid');
                return back();
            }
        }

        ModelsPayment::create($this->all());
        session()->flash('success', 'Successfully Member Attendance');
        $this->resetInputFields();
    }

    public function deletePayment($id)
    {
        $this->paymentId = $id;
    }
    public function editPayment($id)
    {
        $attendance = ModelsPayment::where('id', $id)->first();
        $this->paymentId = $attendance->id;
        $this->amount = $attendance->amount;
        $this->payment_date = $attendance->payment_date;
        $this->note = $attendance->note;
    }

    public function deletePaymentInfo()
    {
        ModelsPayment::where('id', $this->paymentId)->delete();
        $this->emit('closeModel');
        session()->flash('danger', 'Successfully Payment Deleted');
    }

    public function updatePaymentInfo()
    {
        $validatedData = $this->validate([
            'amount' => 'required',
            'payment_date' => 'required',
        ]);
        $member = ModelsPayment::find($this->paymentId);
        $member->update($validatedData);
        $this->emit('closeModel');
        session()->flash('success', 'Successfully Updated');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->member_id = ''; 
        $this->amount = ''; 
        $this->payment_date = ''; 
        $this->note = '';
    }
}
