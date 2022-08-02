<?php

namespace App\Http\Livewire;

use App\Models\Attendance as ModelsAttendance;
use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class Attendance extends Component
{
    public $member_id, $date;
    protected $rules = [
        'member_id' => 'Required',
        'date' => 'Required'
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $data = ModelsAttendance::orderBy('id', 'DESC')->paginate(2);
        $data2 = ModelsAttendance::where('member_id', $this->member_id)->orderBy('id','DESC')->paginate(20);
        return view('livewire.attendance', compact('data','data2'));
    }

    public function store()
    {
        $this->validate();
        $id = Member::find($this->member_id);
        if ($id == null) {
            session()->flash('danger', 'Member Not Registered');
        } else {
            ModelsAttendance::create($this->all());
            session()->flash('success', 'Attendance Successfully Inserted');
        }
    }

    public function deleteAttendance(int $var)
    {
        ModelsAttendance::where('id', $var)->delete();
        session()->flash('danger', 'Successfully Attendance Deleted');
    }

}
