<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;
use Livewire\WithPagination;

class FindAttendance extends Component
{
    public $member_id, $month, $year;
    protected $rules = [
        'member_id' => 'Required',
        'date' => 'Required'
    ];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $data = Attendance::whereMonth('date', $this->month)->orWhereYear('date', $this->year)->orWhere('member_id', $this->member_id)->orderBy('id','DESC')->paginate(20);
        return view('livewire.find-attendance', compact('data'));
    }

}
