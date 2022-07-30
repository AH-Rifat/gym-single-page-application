<?php

namespace App\Http\Livewire;

use App\Models\Member as ModelsMember;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Member extends Component
{
    public $name, $email, $dob, $age, $height, $weight, $work, $bloodGroup, $gender, $address,
        $mobile, $nationalId, $photo, $package, $total, $paid, $due;
    public $edit;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|',
        'email' => 'required|',
        'dob' => 'required|',
        'age' => 'required|',
        'height' => 'required|',
        'weight' => 'required|',
        'work' => 'required|',
        'bloodGroup' => 'required|',
        'gender' => 'required|',
        'address' => 'required|',
        'mobile' => 'required|',
        'nationalId' => 'required|',
        // 'photo' => 'required|',
        'package' => 'required|',
        'total' => 'required|',
        'paid' => 'required|',
        'due' => 'required|',
    ];

    public function render()
    {
        $members = ModelsMember::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.member', ['members' => $members]);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->dob = '';
        $this->age = '';
        $this->height = '';
        $this->weight = '';
        $this->work = '';
        $this->bloodGroup = '';
        $this->gender = '';
        $this->address = '';
        $this->mobile = '';
        $this->nationalId = '';
        $this->photo = '';
        $this->package = '';
        $this->total = '';
        $this->paid = '';
        $this->due = '';
    }

    public function save()
    {
        $this->validate();
        ModelsMember::create($this->all());
        session()->flash('success', 'Successfully Registerd');
        $this->emit('closeModel');
        $this->resetInputFields();
    }

    public function edit($var)
    {
        $this->edit = ModelsMember::where('id', $var)->get();
    }

    public function update($var)
    {
        $this->validate();
        $this->edit = ModelsMember::where('id', $var)->update();
        session()->flash('success', 'Successfully Updated');
        // dd($this->edit);
    }

    public function deleteMember($id)
    {
        ModelsMember::where('id', $id)->delete();
        session()->flash('danger', 'Successfully Member Deleted');
    }
}
