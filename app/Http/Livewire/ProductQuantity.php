<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Auth;

class ProductQuantity extends Component
{

    public $totalPrice;
    public $item;
    public $quantity;

    //protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        if (auth::user()) {
            $this->quantity = $this->item->quantity;
            $this->totalPrice = ($this->item->quantity * $this->item->price);
        } else {
            $this->quantity = $this->item['quantity'];
            $this->totalPrice = $this->item['total_price'];
        }
    }

    public function update($id, $plus)
    {

        if (auth::user()) {
            if ($plus == 3) {

                Cart::where('id', $id)->update([
                    'quantity' => $this->item->quantity + 1,

                ]);
            } else
         if ($plus == 1) {
                if ($this->item->quantity > 1) {
                    Cart::where('id', $id)->update([
                        'quantity' => $this->item->quantity - 1,
                    ]);
                }
            } else {

                Cart::where('id', $id)->update([
                    'quantity' => $this->quantity,
                ]);
            }
            $this->item =  Cart::where('id', $id)->first();
            $this->item->update([
                'total_price' => $this->item->quantity * $this->item->price,
            ]);
            $this->quantity = $this->item->quantity;
            $this->totalPrice = $this->item->total_price;
        } else {


            if ($plus == 3) {

                $cart = session()->get('cart');
                $cart[$id]["quantity"] = $this->item['quantity'] + 1;

                session()->put('cart', $cart);
            } else
         if ($plus == 1) {
            if($this->item['quantity'] > 1)
            {
                $cart = session()->get('cart');
                $cart[$id]["quantity"] = $this->item['quantity'] - 1;
                session()->put('cart', $cart);
            }
            } else {

                $cart = session()->get('cart');
                $cart[$id]["quantity"] = $this->quantity;
                session()->put('cart', $cart);
            }


            $cart = session()->get('cart');
            if (isset($cart[$id])) {

                $cart[$id]['total_price'] = $cart[$id]['price'] *  $cart[$id]['quantity'];

                session()->put('cart', $cart);
                $this->quantity =   $cart[$id]['quantity'];

                $this->totalPrice =  $cart[$id]['total_price'];
            }
        }
        $this->emitUp('reRenderParent');
    }

    public function render()
    {
        return view('livewire.product-quantity');
    }
}
