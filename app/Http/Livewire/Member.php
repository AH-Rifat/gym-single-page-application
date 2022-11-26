<?php

namespace App\Http\Livewire;

use App\Models\Member as ModelsMember;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Member extends Component
{
    public $name, $email, $dob, $age, $height, $weight, $work, $bloodGroup, $gender, $address,
        $mobile, $nationalId, $photo, $package, $total, $paid, $due;
    public $editId, $memberIdForDelete;
    use WithPagination, WithFileUploads;
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
        'photo' => 'required|max:1024|mimes:png,jpeg,gif',
        'package' => 'required|',
        'total' => 'required|',
        'paid' => 'required|',
        'due' => 'required|',
    ];

    public function render()
    {
        $members = ModelsMember::orderBy('id', 'DESC')->paginate(3);
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
        if (isset($this->photo)) {
            $photoName = md5($this->photo . microtime()) . '.' . $this->photo->extension();
            $this->photo->storeAs('memberPhotos', $photoName);
        }
        
        $this->validate();
        ModelsMember::create([
            'name' => $this->name,
            'email' => $this->email,
            'dob' => $this->dob,
            'age' => $this->age,
            'height' => $this->height,
            'weight' => $this->weight,
            'work' => $this->work,
            'bloodGroup' => $this->bloodGroup,
            'gender' => $this->gender,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'nationalId' => $this->nationalId,
            'photo' => empty($photoName) ? NULL:$photoName,
            'package' => $this->package,
            'total' => $this->total,
            'paid' => $this->paid,
            'due' => $this->due,
        ]);
        session()->flash('success', 'Successfully Registerd');
        $this->emit('closeModel');
        $this->resetInputFields();
    }

    public function edit($var)
    {
        $member = ModelsMember::where('id', $var)->first();
        $this->editId     = $member->id;
        $this->name       = $member->name;
        $this->email      = $member->email;
        $this->dob        = $member->dob;
        $this->age        = $member->age;
        $this->height     = $member->height;
        $this->weight     = $member->weight;
        $this->work       = $member->work;
        $this->bloodGroup = $member->bloodGroup;
        $this->gender     = $member->gender;
        $this->address    = $member->address;
        $this->mobile     = $member->mobile;
        $this->nationalId = $member->nationalId;
        $this->photo      = $member->photo;
        $this->package    = $member->package;
        $this->total      = $member->total;
        $this->paid       = $member->paid;
        $this->due        = $member->due;
    }

    public function MemberUpdate($var)
    {
        // dd($var);
        $this->validate();
        $member = ModelsMember::find($var);
        $member->update($this->all());
        session()->flash('success', 'Successfully Updated');
    }

    public function deleteMember($id)
    {
        $this->memberIdForDelete = $id;
    }

    public function deleteMemberInfo()
    {
        $member = ModelsMember::find($this->memberIdForDelete);

        if (Storage::exists('memberPhotos/'.$member->photo)) {
            Storage::delete('memberPhotos/'.$member->photo);
        }
        $member->delete();

        $this->emit('closeModel');
        session()->flash('danger', 'Successfully Member Deleted');
    }
}
