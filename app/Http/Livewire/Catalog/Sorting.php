<?php

namespace App\Http\Livewire\Catalog;

use App\Models\Brand;
use Livewire\Component;

class Sorting extends Component
{
    public function render()
    {
        $brands = Brand::get();
        return view('livewire.catalog.sorting',[
            'brands' => $brands,
        ]);
    }
}
