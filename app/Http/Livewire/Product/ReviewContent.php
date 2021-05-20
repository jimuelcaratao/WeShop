<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class ReviewContent extends Component
{
    public $reviews;
    public $product;


    public function mount($reviews,$product)
    {
        $this->reviews = $reviews;
        $this->product = $product;

    }

    public function render()
    {
        return view('livewire.product.review-content',[
        ]);
    }
}
