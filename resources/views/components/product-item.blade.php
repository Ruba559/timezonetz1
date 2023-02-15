<div class="col-md-3 col-sm-6 col-12 " data-aos="{{$fade_arr[array_rand($fade_arr)]}}">

                    <div class=" product-card-advanced align-items-center">
                        <a href="{{route('product',$item->slug)}}">
                        <img class="img-fluid new-sign" src="{{asset('images/new-sign.png')}}" alt="Time Zone New">
                        <img class="img-fluid  product-img" src="{{asset('storage/'.json_decode($item->images, true)[0])}}" alt="">
                        <h5 class="text-black">{{$item->brand->name}}
                            <br>{{Str::limit($item->name,20)}}</h5>
                        <div class="details">

                            {{-- <p>{{$item->brand->name}}</p> --}}
                            @if($item->offer)
                            <p class="old-price text-red">{{$item->price}} SDG</p>
                            <h6>{{$item->offer}} SDG</h6>  
                            @else
                            <h6 class="text-red">{{$item->price}} SDG</h6>
                            @endif
                        </div>
                    </a>
                        @livewire('add-to-cart' , ['product' => $item , 'current' => 1])
                       
                    </div>
  
</div>