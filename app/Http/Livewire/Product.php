<?php

namespace App\Http\Livewire;

use Livewire\Component;

//use App\Models\Product ;

class Product extends Component
{
    public $products;
    public $search;

    public function mount()
    {
        $prods = \App\Models\Product::with('category')->get();
        $this->products = $prods->toArray();
    }

    public function updated()
    {

        $prod = \App\Models\Product::with('category')->where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhereIn('id', [$this->search])->get();
//        dd($prod);
        if ($prod != []) {
            $this->products = $prod->toArray();
//            dd($this->products);
        } else
            return;
    }

    public function render()
    {
        return view('livewire.product');
    }
}
