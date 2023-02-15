
    <div class="col-md-3 col-sm-6 col-12 p-2 px-2" data-aos="{{$fade_arr[array_rand($fade_arr)]}}">
        
        <div class="product-grid6 mx-auto">
            <a href="{{route('product',$item->slug)}}">
            <div class="product-image px-2 d-block mx-auto">
                {{-- @if ($product->isnew==='new')
                    <span class="isnew">New</span>
                @endif --}}
                @if(json_decode($item->images) != null )
                
                
                    <img class=" mx-auto d-block my-2" src="{{asset('storage/'.json_decode($item->images)[0])}}">
                
                @endif

            </div>
            </a>
            <div class="product-content d-block mx-auto">
                <h5 class=" f-bold text-black text-center">{{$item->name}}</h5>
            
                <div class="product-price text-center">
                    <span class="  text-grey"><small class=" text-lth">{{$item->price}} SDG </small> <span class="mx-2 f-bold  text-gold"> {{$item->offer}} SDG</span></span>

                </div>
                
            </div>
            @livewire('add-to-cart' , ['product' => $item , 'current' => 1])
            
        </div>
    </div>

