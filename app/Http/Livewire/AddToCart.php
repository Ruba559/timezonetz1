<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Favorite;
use Auth;

class AddToCart extends Component
{
    public $product;

    public $current;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount($current)
    {
        $this->current = $current;
    }

    public function save()
    {
        if (!auth::user()) {

            $cart = session()->get('cart', []);

            if (isset($cart[$this->product->id])) {
                return response()->json([
                    'message' => 'The product is on the cart',
                ]);
            } else {

                $cart[$this->product->id] = [
                    'id' =>  $this->product->id,
                    'name' =>  $this->product->name,
                    'image' =>  json_decode($this->product->images, true)[0],
                    'brand' =>  $this->product->brand->name,
                    'quantity' => '1',
                    'price' => $this->product->price,
                    'total_price' => $this->product->price,
                ];
            }

            session()->put('cart', $cart);
        } else {

            $cart = Cart::where('user_id', auth::user()->id)->where('product_id', $this->product->id)->first();
            if (!$cart) {

                Cart::create([
                    'product_id' =>  $this->product->id,
                    'quantity' => '1',
                    'price' => $this->product->price,
                    'user_id' => auth::user()->id,
                    'total_price' => $this->product->price,
                ]);

                session()->flash('message', 'Send success');
            }
        }
        $this->emitTo('cart-icon', 'reRender');
    }


    public function addToFavorite()
    {
        if (!auth::user()) {
            return redirect()->to('/login');
        }
        $favorite = Favorite::where('user_id', auth::user()->id)->where('product_id', $this->product->id)->first();
        if (!$favorite) {
            Favorite::create([
                'product_id' =>  $this->product->id,
                'user_id' => auth::user()->id,

            ]);

            session()->flash('message', 'Send success');
        }
        $this->emit('refreshComponent');
    }


    public function removeFavorite()
    {

        if (!auth::user()) {
            return redirect()->to('/login');
        }
        $favorite = Favorite::where('product_id',  $this->product->id)->where('user_id', auth::user()->id)->first();
        if ($favorite) {
            $favorite->delete();
        }
        $this->emit('refreshComponent');
    }


    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
