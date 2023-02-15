<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Pricing extends Component
{

    public $item;

    public $price;
    public $offer;

    protected $listeners  = ['reRender'];


    public function reRender(){
       
        $this->mount($this->item);
         $this->render();
    }

    public function mount($item)
    {
        $this->price = $item->price;
        $this->offer = $item->offer;
    }

    public function update()
    {

        $product = Product::where('id', $this->item->id)->first();
        $product->update([
            'price' => $this->price,
            'offer' => $this->offer,
        ]);
       

    }

    public function render()
    {
        return view('livewire.pricing');
    }
}
