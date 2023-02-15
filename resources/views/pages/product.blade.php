@extends('layouts.master',['title'=>'Time Zone | '.$product->name,'desc'=>$product->description ,"nav_bl"=>true])


@section('head')
    <link rel="stylesheet" href="{{asset('css/product.css')}}">

    <script src="{{asset('js/product.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @livewireStyles
@endsection

@section('body')
    
<div class="container-fluid my-5">
    <div class="row p-md-5 p-2">
        <div class="col-md-8 col-12" >
            <div class="image-gallery">
                
                <img class="main-image mb-2 img-fluid" width="80%" src="{{asset('storage/'.json_decode($product->images)[0])}}" alt="{{$product->name}}">
                <div class="thumbs">
                    @foreach (json_decode($product->images) as $item)
                    <img class="img-fluid thumb-item" src="{{asset('storage/'.$item)}}" alt="">
                    @endforeach
                    @foreach (json_decode($product->images) as $item)
                    <img class="img-fluid thumb-item" src="{{asset('storage/'.$item)}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="row justify-content-start align-items-center">
                <div class="mr-3">
                    @if ($product->brand)
                    <div class="">
                        <img class=" bg-white brand-image" src="{{asset('storage/'.$product->brand->image)}}" alt="{{$product->brand->name}}">
                        
                    </div>
                    @endif
                </div>
                <div>
                    @if ($product->brand)
                    <div class="">
                        <h1 class="f-bold text-blue">{{$product->brand->name}}</h1>
                        <h2 class="text-grey ">{{$product->description}}</h2>
                        <h3 class=""><small class="text-lth text-red mx-2">{{$product->price}} </small> <span class="f-bold mx-1">{{$product->offer}}</span> <small class="text-grey currency">{{setting('site.main_currency')}}</small></h3>
          
                    </div>
                    @endif
                </div>
            </div>
            
           
            <p class="text-grey my-2"><span class="fa fa-eye mx-2"> </span> {{$product->views}} @lang('welcome.views')</p>
            <hr>
           
             
            @livewire('add-to-cart' , ['product' => $product , 'current' => 2])

        </div>
    </div>
            <div class="row justify-content-start p-md-5 p-2 mt-3">
            <div class="col-md-8 col-12">
                <h5 class="font-weight-bold text-blue mb-5">@lang('product.details')  <i class="bi bi-caret-down-fill"
                    style="font-size: 20px" id="Details"></i></h5>
                    @if($product->brand || $product->reference_number || $product->gender || $product->stock)
                    <div class="details-box">
                        <h3 class="details-header ">@lang('product.general')</h3>
                        <table class="table table-hover">
                            <tbody>
                                @if ($product->brand)
                                <tr>
                                    <td>
                                        @lang('product.brand')
                                    </td>
                                    <td>
                                        {{$product->brand->name}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->reference_number)
                                <tr>
                                    <td>
                                        @lang('product.reference_number')
                                    </td>
                                    <td>
                                        {{$product->reference_number}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->gender)
                                <tr>
                                    <td>
                                        @lang('product.gender')
                                    </td>
                                    <td>
                                        {{$product->gender==0 ? Lang::get('product.Men') : Lang::get('product.Women')}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->stock)
                                <tr>
                                    <td>
                                        @lang('product.stock')
                                    </td>
                                    <td>
                                        {{$product->stock==1 ? Lang::get('product.available') : Lang::get('product.notavailable')}}
                                    </td>
                                </tr> 
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @if($product->movement || $product->case_size || $product->case_material || $product->bracelet_material || $product->bracelet_color || $product->water_resistance || $product->other)
                    <div class="details-box mt-5">
                        <h3 class="details-header ">@lang('product.details')</h3>
                        <table class="table table-hover">
                            <tbody>
                                @if ($product->movement)
                                <tr>
                                    <td>
                                    @lang('property.movement')
                                    </td>
                                    <td>
                                        {{$product->movement}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->case_size)
                                <tr>
                                    <td>
                                    @lang('property.case_size')
                                    </td>
                                    <td>
                                        {{$product->case_size}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->case_material)
                                <tr>
                                    <td>
                                    @lang('property.case_material')
                                    </td>
                                    <td>
                                        {{$product->case_material}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->bracelet_material)
                                <tr>
                                    <td>
                                    @lang('property.bracelet_material')
                                    </td>
                                    <td>
                                        {{$product->bracelet_material}}
                                    </td>
                                </tr> 
                                @endif
                                
                                @if ($product->bracelet_color)
                                <tr>
                                    <td>
                                    @lang('property.bracelet_color')
                                    </td>
                                    <td>
                                        {{$product->bracelet_color}}
                                    </td>
                                </tr> 
                                @endif
                                
                                @if ($product->water_resistance)
                                <tr>
                                    <td>
                                    @lang('property.water_resistance')
                                    </td>
                                    <td>
                                        {{$product->water_resistance}}
                                    </td>
                                </tr> 
                                @endif
                                @if ($product->other)
                                <tr>
                                    <td>
                                    @lang('property.other')
                                    </td>
                                    <td>
                                        {{$product->other}}
                                    </td>
                                </tr> 
                                @endif


                            </tbody>
                        </table>
                    </div>
                    @endif

            </div>


            </div>
        </div>
        <div class="row p-md-5 p-2 bg-white">
            <div class="col-12 mb-5">
                <h4 class="underline-text text-blue d-inline">@lang('product.related_products')</h4>
            </div>
            @foreach ($related as $item)
            @include('components.products.item1' , [$item])
            @endforeach
        </div>
    </div>
</div>
@livewireScripts
@endsection
