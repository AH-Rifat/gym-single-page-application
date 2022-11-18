<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    public $totalMembers;
    public $totalPaidMembers;
    public $totalUnpaidMembers;
    public $totalDeactiveMembers;
    public $show, $totalAmount, $paginateValue, $id_or_name;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $deactiveInfo = Member::where('status', 2)->where('name', 'LIKE', '%' . $this->id_or_name . '%')->paginate($this->paginateValue);
        $unpaidInfo = Member::where('status', 0)->where('name', 'LIKE', '%' . $this->id_or_name . '%')->paginate($this->paginateValue);
        $paidInfo = Payment::whereYear('payment_date', date('Y'))->whereMonth('payment_date', date('m'))->where('member_id', 'LIKE', '%' . $this->id_or_name . '%')->paginate($this->paginateValue);
        return view('livewire.home', compact('paidInfo', 'unpaidInfo', 'deactiveInfo'));
    }

    public function mount()
    {
        $this->totalMembers = count(Member::all());
        $this->totalPaidMembers = Member::where('status', 1)->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
        $this->totalUnpaidMembers = Member::where('status', 0)->count();
        $this->totalDeactiveMembers = Member::where('status', 2)->count();
        $this->status();
    }

    public function status()
    {
        $member = Member::all();
        foreach ($member as $members) {
            
            if ($members->lastDate != null) {

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

    public function viewPaidMembers()
    {
        $this->show = 'paid';
        $this->totalAmount = Payment::whereYear('payment_date', date('Y'))->whereMonth('payment_date', date('m'))->sum('amount');
    }

    public function viewUnpaidMembers()
    {
        $this->show = 'unpaid';
    }

    public function viewDeactiveMembers()
    {
        $this->show = 'deactive';
    }
}
