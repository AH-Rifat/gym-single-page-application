<?php

namespace App\Http\Livewire;

use App\Models\Expence as ModelsExpence;
use Livewire\Component;

class Expence extends Component
{
    public $name,$amount,$date, $expenceId;
    protected $rules = [
        'name' => 'required',
        'amount' => 'required',
        'date' => 'required',
    ];
    public function render()
    {
        $data = ModelsExpence::whereYear('date', date('Y'))->get();
        return view('livewire.expence', compact('data'));
    }

    public function store()
    {
        $this->validate();
        ModelsExpence::create($this->all());
        session()->flash('success', 'Successfully Expence Info Added');
    }

    public function deleteId($id)
    {
        $this->expenceId = $id;
    }

    public function editId($id)
    {
        $updateData = ModelsExpence::where('id', $id)->first();
        $this->expenceId = $updateData->id;
        $this->name = $updateData->name;
        $this->amount = $updateData->amount;
        $this->date = $updateData->date;

    }
    
    public function deleteExpence()
    {
        ModelsExpence::where('id', $this->expenceId)->delete();
        $this->emit('closeModel');
        session()->flash('success', 'Successfully Deleted');
    }

    public function updateExpence()
    {
        $this->validate();
        $data = ModelsExpence::find($this->expenceId);
        $data->update($this->all());
        $this->emit('closeModel');
        session()->flash('success', 'Successfully Updated');
    }
}
