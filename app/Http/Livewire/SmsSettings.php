<?php

namespace App\Http\Livewire;

use App\Models\Sms;
use Livewire\Component;

class SmsSettings extends Component
{
    public $apiKey, $textType, $senderId;
    protected $rules = [
        'apiKey' => 'required',
        'textType' => 'required',
        'senderId' => 'required',
    ];

    public function render()
    {
        $smsInfo = Sms::all();
        return view('livewire.sms-settings', compact('smsInfo'));
    }

    public function save(Sms $sms)
    {
        $this->validate();

        foreach ($sms->all('id') as $value) {
            if ($value->id > 0) {
                session()->flash('danger', 'Your Settings Already Have Set');
                $this->resetInputFields();
                return back();
            }
        }

        $sms->create([
            'api_key' => $this->apiKey,
            'type' => $this->textType,
            'sender_id' => $this->senderId,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Successfully Saved');
    }

    public function delete()
    {
        foreach (Sms::all('id') as $value) {
            Sms::where('id', $value->id)->delete();
            session()->flash('success', 'Delete Successfully');
        }
    }

    public function resetInputFields()
    {
        $this->apiKey = ' ';
        $this->textType = ' ';
        $this->senderId = ' ';
    }
}
