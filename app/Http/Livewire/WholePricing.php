<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WholePricing extends Component
{

    public $products;

    public $whole_pricing;

    public function mount()
    {
       
        
    }

    public function updateAllProducts()
    {

        foreach($this->products as $item)
        {
            $item->update([

                'price' =>  $item->price+($item->price * $this->whole_pricing  / 100)  , 
    
            ]);
        }
        $this->whole_pricing = '';
        $this->emitTo('pricing', 'reRender');
      
    }

  
  
    public function render()
    {
        return view('livewire.whole-pricing');
    }
}
