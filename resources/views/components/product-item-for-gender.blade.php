<div class="col-sm-6 col-12  product-card-simple align-items-center" data-aos="{{$fade_arr[array_rand($fade_arr)]}}">
    <a href="{{route('product',$item->slug)}}">
                    <img class="img-fluid" src="{{asset('storage/'.json_decode($item->images, true)[0])}}" alt="">
               
                    <h5 class="text-black">{{$item->brand->name}} <br>{{$item->name}}</h5>
                    <div class="details">
                        @if($item->offer)
                            <p class="text-grey text-lth">{{$item->price}} SDG</p>
                            <h6 class="text-blue text-lth">{{$item->offer}} SDG</h6>  
                            @else
                            <h6>{{$item->price}} SDG</h6>
                            @endif
                    </div>
                </a>
                    @livewire('add-to-cart' , ['product' => $item , 'current' => 1])
  
                </div>