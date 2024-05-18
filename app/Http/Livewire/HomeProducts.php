<?php

namespace App\Http\Livewire;

use App\Models\ShopProduct;
use Livewire\Component;

class HomeProducts extends Component
{
    public $readyToLoad = false , $products ;

    public function loadData()
    {
        $this->readyToLoad = true;
    }

    public function mount()
    {
        $this->products = ShopProduct::limit(20)->get();
    }
    public function render()
    {
        return view('livewire.home-products');
    }
}
