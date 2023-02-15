<?php

namespace App\Http\Livewire;

use App\Events\NotificationEvent;
use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Auth;

class UserCart extends Component
{

    public $cart;
    public $quantity ;
    public $totalPrice =0 , $totalOffer =0 , $total=0;


    public $searching =false;
   
    protected $listeners = ['refreshComponent' => '$refresh' , 'reRenderParent'];
   
    
    public function reRenderParent()
    {

        if(auth::user())
        {
          $this->totalPrice = Cart::where('user_id' , auth::user()->id)->sum('total_price');
        }
        
      

        $this->emitSelf('refreshComponent');
    }


    public function mount()
    {
        if(auth::user())
        {
           $this->cart =  Cart::where('user_id' , auth::user()->id)->get();
        }
        else
        {

            $cart = session()->get('cart');

            if(isset($cart)) 
            {
               $this->cart = session()->get('cart');
               
               
            }
        }
  
 
    }


    public function delete($id)
    {
        Cart::where('id' , $id)->delete();

        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $this->cart = session()->get('cart');
        }

       $this->emit('refreshComponent');
       $this->emitTo('cart-icon', 'reRender');
    }
    
    public function render()
    {
        if(auth::user())
        {
            $this->totalPrice = Cart::where('user_id' , auth::user()->id)->sum('total_price');

            $this->totalOffer = 0;
            $this->total = 0;

           

            foreach($this->cart as $item)
            {
              
               $this->totalOffer += $item->quantity * ($item->product->price - $item->product->offer) ;
               
            }

             $this->total = $this->totalPrice - $this->totalOffer ;
            
        }else{

             $cart = session()->get('cart');

             if(isset($cart)) 
             {
                $this->totalPrice = 0;
                $this->totalOffer = 0;
                $this->total = 0;
            
             foreach($cart as $key=> $item)
             {
                $this->totalPrice +=  $item['total_price'];

                 
                $product = Product::where('id' , $item['id'])->first();

                $this->totalOffer += $item['quantity'] * ($product->price - $product->offer) ;
 
                 $this->total = $this->totalPrice - $this->totalOffer ;
             }
            

            }
            
        }
   
        return view('livewire.user-cart');
    }
    public function sendNotify()
    {
        event( new NotificationEvent(5));
    }
}
