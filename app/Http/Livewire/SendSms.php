<?php

namespace App\Http\Livewire;

use App\Models\Member;
use App\Models\Sms;
use Livewire\Component;
use Livewire\WithPagination;

class SendSms extends Component
{
    public $mgs, $paginateValue, $paginateValue1, $paginateValue2;
    public $selectNumbers = [], $selectNumbers1 = [], $selectNumbers2 = [];
    public $selectAll = false, $selectAll1 = false, $selectAll2 = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $unPaidMembers = Member::where('status', 0)->paginate($this->paginateValue1);
        $deactiveMembers = Member::where('status', 2)->paginate($this->paginateValue2);
        $allMembers = Member::paginate($this->paginateValue);
        return view('livewire.send-sms', compact('allMembers', 'unPaidMembers', 'deactiveMembers'));
    }

    public function send()
    {
        $this->validate([
            'selectNumbers' => 'required',
        ]);

        if ($this->selectNumbers != []) {
            $this->handleErrorResponse($this->send_sms($this->selectNumbers));
        }
        if ($this->selectNumbers1 != []) {
            $this->handleErrorResponse($this->send_sms($this->selectNumbers1));
        }
        if ($this->selectNumbers2 != []) {
            $this->handleErrorResponse($this->send_sms($this->selectNumbers2));
        }
    }

    public function updatedselectAll($var)
    {
        if ($var) {
            $this->selectNumbers1 = [];
            $this->selectNumbers2 = [];
            $this->selectAll1 = false;
            $this->selectAll2 = false;
            $this->selectNumbers = Member::pluck('mobile');
        } else {
            $this->selectNumbers = [];
        }
    }

    public function updatedselectAll1($var)
    {
        if ($var) {
            $this->selectNumbers = [];
            $this->selectNumbers2 = [];
            $this->selectAll = false;
            $this->selectAll2 = false;
            $this->selectNumbers1 = Member::where('status', 0)->pluck('mobile');
        } else {
            $this->selectNumbers1 = [];
        }
    }

    public function updatedselectAll2($var)
    {
        if ($var) {
            $this->selectNumbers1 = [];
            $this->selectNumbers = [];
            $this->selectAll1 = false;
            $this->selectAll = false;
            $this->selectNumbers2 = Member::where('status', 2)->pluck('mobile');
        } else {
            $this->selectNumbers2 = [];
        }
    }

    private function send_sms($mobileNumber)
    {
        foreach (Sms::all() as $value)
            foreach ($mobileNumber as $mobileNumbers) {
                $contacts[] = $mobileNumbers;
            }
        $url = "http://g.dianasms.com/smsapi";
        $data = [
            "api_key" => $value->api_key,
            "type" => $value->type,
            "contacts" => implode("+", $contacts),
            "senderid" => $value->sender_id,
            "msg" => $this->mgs,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    private function handleErrorResponse($responseMassage)
    {
        switch ($responseMassage) {
            case '1002':
                session()->flash('danger', 'Sender Id/Masking Not Found');
                break;
            case '1003':
                session()->flash('danger', 'API Not Found');
                break;
            case '1004':
                session()->flash('danger', 'SPAM Detected');
                break;
            case '1005':
                session()->flash('danger', 'Internal Error');
                break;
            case '1006':
                session()->flash('danger', 'Internal Error');
                break;
            case '1007':
                session()->flash('danger', 'Balance Insufficient');
                break;
            case '1008':
                session()->flash('danger', 'Message is empty');
                break;
            case '1009':
                session()->flash('danger', 'Message Type Not Set (text/unicode)');
                break;
            case '1010':
                session()->flash('danger', 'Invalid User & Password');
                break;
            case '1011':
                session()->flash('danger', 'Invalid User Id');
                break;

            default:
                session()->flash('success', 'Successfully Send SMS');
                break;
        }
    }
}
