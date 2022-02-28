<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\UserCard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Card extends Component
{

    public $cardname;
    public $cardnumber;
    public $expmonth;
    public $expyear;
    public $ccv;
    public $user;

    protected $rules = [
        'cardname' => 'required',
        'cardnumber' => 'required|numeric|digits:16',
        'expmonth' => 'required|numeric|digits:2|max:12',
        'expyear' => 'required|numeric|digits:4',
        'ccv' => 'required|numeric|digits:3',
    ];


    public function createProfileCard()
    {
        $this->validate();

        UserCard::create([
            'user_id' => Auth::id(),
            'cardname' => $this->cardname,
            'cardnumber' => $this->cardnumber,
            'expmonth' => $this->expmonth,
            'expyear' => $this->expyear,
            'ccv' => $this->ccv,
        ]);

        $this->user = User::find(Auth::id())->user_card;
    }

    public function updateProfileCard($user_card_id)
    {
        $this->validate();

        $address = UserCard::find($user_card_id);
        $address->user_id = Auth::id();
        $address->cardname = $this->cardname;
        $address->cardnumber = $this->cardnumber;
        $address->expmonth = $this->expmonth;
        $address->expyear = $this->expyear;
        $address->ccv = $this->ccv;

        $address->save();

        $this->user = User::find(Auth::id())->user_card;
    }

    public function mount()
    {
        $this->user = User::find(Auth::id())->user_card;
    }
    public function render()
    {
        return view('livewire.user.card');
    }
}
