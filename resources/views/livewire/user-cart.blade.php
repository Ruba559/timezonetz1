

    <div class="row justify-content-start align-items-start">
        <div class="col-md-8">
         @auth()
            <div class="card">
                <div class="card-header py-3 bg-grey text-white">
                    <h5 class="mb-0">@lang('cart.cart')</h5>
                </div>
                
                <div class="card-body">
                  
                    @foreach ($cart as $item)
                        <div class="row justify-content-start align-items-center my-1">
                            <div class="col-3 cart-img-container">
                                <div class="deleter" wire:click="delete({{$item->id}})">
                                    <span class="fa fa-trash "></span>
                                </div>
                                <img class="img-fluid d-block img-rounded mx-auto cart-product-img" width="70%"
                                    src="{{ asset('storage/' . json_decode($item->product->images, true)[0]) }}"
                                    alt="{{ $item->product->name }}" />
                            </div>
                            <div class="col-6 ">
                                @if ($item->product->brand)
                                    <h3 class="mont-font"><strong>{{ $item->product->brand->name }}</strong></h3>
                                @endif
                                <p class=" my-0 mont-font">{{ $item->product->name }}</p>
                                <small class="d-block mt-0 mb-2">@lang('cart.unit_price') :  <span class="mont-font">{{ $item->product->price }}</span> </small>
                                
                                
                        </div>
                        <div class="col-3 text-center justify-content-center p-2">
                            @livewire('product-quantity', ['item' => $item], key($item->id))
                           
                        </div>
                            </div>
                            <hr>
                    @endforeach
                  
                </div>
             
          </div>
                @endauth
                @guest
                <div class="card">
                <div class="card-header py-3 bg-grey text-white">
                    <h5 class="mb-0">@lang('cart.cart')</h5>
                </div>
                <div class="card-body">
                    @if($cart)
                    @foreach ($cart as $item)
                    <div class="row justify-content-start align-items-center my-1">
                            <div class="col-3 cart-img-container">
                                <div class="deleter" wire:click="delete({{$item['id']}})">
                                    <span class="fa fa-trash "></span>
                                </div>
                                <img class="img-fluid d-block img-rounded mx-auto cart-product-img" width="70%"
                                    src="{{ asset('storage/' . $item['image']) }}"
                                    alt="{{$item['name']}}" />
                            </div>
                            <div class="col-6 ">
                              
                                    <h3 class="mont-font"><strong>{{$item['brand']}}</strong></h3>
                             
                                <p class=" my-0 mont-font">{{$item['name']}}</p>
                                <small class="d-block mt-0 mb-2">@lang('cart.unit_price') :  <span class="mont-font">{{$item['price']}}</span> </small>
                                
                                
                            </div>
                        <div class="col-3 text-center justify-content-center p-2">
                          @livewire('product-quantity', ['item' => $item], key($item['id']))
                        </div>
                            </div>
                            <hr>
                    @endforeach
                    @endif
                </div>
                </div>
                @endguest
           
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">@lang('cart.summary')</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            @lang('cart.products')
                            <span>${{$totalPrice}}</span>
                        </li>
                        @if($totalOffer > 0 && $totalOffer != $totalPrice)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                         @lang('cart.discount')
                            <span>${{$totalOffer}}</span>
                        </li>
                        @endif
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>@lang('cart.total_amount')</strong>
                            
                            </div>
                            <span><strong>${{$total}}</strong></span>
                        </li>
                    </ul>

                    <button type="button" class="btn bg-blue text-white btn-lg btn-block" wire:click="sendNotify">
                        @lang('cart.checkout')
                    </button>
                </div>
            </div>
        </div>


        </div>


