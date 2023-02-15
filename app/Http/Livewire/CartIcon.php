<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Auth;

class CartIcon extends Component
{

    public $count;
    protected $listeners  = ['reRender'];
    public $bottom = false;

    public function reRender(){
       
        $this->mount();
         $this->render();
    }

    public function mount()
    {
        $this->count =auth::user()!=null ?  Cart::where('user_id' , auth::user()->id)->count() : 0;
        
        
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
