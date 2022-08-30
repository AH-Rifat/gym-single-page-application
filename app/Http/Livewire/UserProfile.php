<?php

namespace App\Http\Livewire;

use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;

class UserProfile extends Component
{
    public $current_password, $password , $password_confirmation;
    public $name, $email;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $updater->update(auth()->user(),[
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->emit('nameChanged', auth()->user()->name);
 
        session()->flash('success','Successfuly Updated !');
    }

    public function changePassword(UpdatesUserPasswords $updater)
    {
        $updater->update(auth()->user(),[
            'current_password' => $this->current_password,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation
        ]);

        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';
 
        session()->flash('success','Successfuly Updated !');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

}
