<?php

namespace App\Http\Livewire;

use App\Models\Expence as ModelsExpence;
use Livewire\Component;
use Livewire\WithPagination;

class Expence extends Component
{
    public $name,$amount,$date,$month, $expenceId;
    protected $rules = [
        'name' => 'required',
        'amount' => 'required',
        'date' => 'required',
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $date=date_create($this->month);
        $year=date_format($date,"Y");
        $monthh=date_format($date,"m");
        $data = ModelsExpence::orderBy('id', 'DESC')->whereYear('date', $year)->whereMonth('date', $monthh)->paginate(20);
        return view('livewire.expence', compact('data'));
    }

    public function store()
    {
        $this->validate();
        ModelsExpence::create($this->all());
        session()->flash('success', 'Successfully Expence Info Added');
        $this->resetInputFields();
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
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->amount = '';
        $this->date = '';
    }
}
