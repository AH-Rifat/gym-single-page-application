<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Payment;
use Livewire\Component;

class Home extends Component
{
    public $totalMembers;
    public $totalPaidMembers;
    public $totalUnpaidMembers;
    public $totalDeactiveMembers;
    
    public function render()
    {
        return view('livewire.home');
    }

    public function mount()
    {
        $this->totalMembers = count(Member::all());
        $this->totalPaidMembers = Member::where('status', 1)->count();
        $this->totalUnpaidMembers = Member::where('status', 0)->count();
        $this->totalDeactiveMembers = Member::where('status', 2)->count();
        $this->status();
    }

    public function status()
    {
        $member = Member::all();
        foreach ($member as $members) {
            $lastDate = $members->lastDate->payment_date->format('Y-m');
            $threeMonthsBefore = $members->lastDate->payment_date->addMonths(3)->format('Y-m');

            if ($lastDate < now()->format('Y-m')) {
                Member::where('id', $members->id)->update(['status' => 0]);
            }

            if ($lastDate == now()->format('Y-m')) {
                Member::where('id', $members->id)->update(['status' => 1]);
            }

            if ($threeMonthsBefore < now()->format('Y-m')) {
                Member::where('id', $members->id)->update(['status' => 2]);
            }
        }
    }
}
