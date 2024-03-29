<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductSearch extends Component
{
    public $products;
    public $categories;
    public $search;

    public function mount()
    {
        $this->resetSearch();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->products = [];
        $this->categories = [];
    }

    public function updatedSearch()
    {
        $this->products = DB::table('brands')
            ->join('products', 'brands.brand_id', '=', 'products.brand_id')
            ->where('products.product_name', 'like', '%' . $this->search . '%')
            ->orWhere('brands.brand_name', 'like', '%' . $this->search . '%')
            ->get();

        $this->categories = DB::table('categories')
            ->where('category_name', 'like', '%' . $this->search . '%')
            ->get();

    }

    public function render()
    {
        return view('livewire.product.product-search');
    }
}
