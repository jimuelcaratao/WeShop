<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;

class Address extends Component
{
    public $mobile_no;
    public $house;
    public $city;
    public $province;
    public $barangay;
    public $user;

    protected $rules = [
        'mobile_no' => ['required', 'string', 'max:20'],
        'house' => ['required', 'string'],
        'city' => ['required', 'string'],
        'province' => ['required', 'string'],
        'barangay' => ['required', 'string'],
    ];


    public function profileAddress()
    {
        $this->validate();

        UserAddress::create([
            'user_id' => Auth::id(),
            'mobile_no' => $this->mobile_no,
            'house' => $this->house,
            'city' => $this->city,
            'province' => $this->province,
            'barangay' => $this->barangay,
        ]);
    }

    public function mount()
    {
        $this->user = User::find(Auth::id())->user_address;
    }

    public function render()
    {
        return view('livewire.user.address');
    }
}
