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


    public function createProfileAddress()
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

        $this->user = User::find(Auth::id())->user_address;
    }

    public function updateProfileAddress($user_address_id)
    {
        $this->validate();

        $address = UserAddress::find($user_address_id);
        $address->user_id = Auth::id();
        $address->mobile_no = $this->mobile_no;
        $address->house = $this->house;
        $address->city = $this->city;
        $address->province = $this->province;
        $address->barangay = $this->barangay;

        $address->save();

        $this->user = User::find(Auth::id())->user_address;
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
