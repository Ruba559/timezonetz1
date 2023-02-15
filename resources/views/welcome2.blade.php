@extends('layouts.master')

@section('body')
    <section class=" header">
        <div class="overlay1"></div>
        <img src="{{ asset('images2/banner1.jpg') }}" alt="banner">
        <div class="caption">
            <h1>@lang('welcome.TOP_WATCHES_MODELS')<br>
                <small>@lang('welcome.in_one_place')</small></h1>

            <a href="#start" class="anchor-c btn"><span>@lang('welcome.explore_now')</span></a>
        </div>
        <div class="overlay2"></div>
    </section>

    <section class="container-fluid bg-white mt-5">
        <div class="row p-md-5 p-5">
            <div class="col-12">
                <div class="row justify-content-between align-items-center">
                    <h2 class="underline-text text-blue">@lang('welcome.top_brands')</h2>
                    <a href="{{route('brands')}}" class="text-grey">@lang('welcome.explore_brands')</a>
                </div>
            </div>
            <div class="col-12 p-md-5 p-2">
                <div class="swiper swiper-container brands-swiper ">
                    <div class="swiper-wrapper ">
                        @foreach ($brands as $item)
                       
                            <div class="swiper-slide">
                            <a href="{{route('brand' , $item->slug)}}">
                                <img class="img-fluid" width="100%" src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}">
                                <p class="text-center blue-text font-weight-bold">{{ $item->name }}</p>
                                </a>
                            </div>
                         
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section  id="start" class="container-fluid bg-light">
        <div class="row p-md-5 p-2 justify-content-center ">
            <div class="col-md-6 col-11 ">
                <div class="for-container ">
                    <div class="overlay2"></div>
                    <img class="img-fluid" src="{{ asset('images2/men.jpg') }}" alt="">
                    <div class="caption">
                        <h3 data-aos="fade-up">@lang('welcome.WATCHES_FOR_HIM')</h3>
                        <a data-aos="fade-left" href="{{route('forHim')}}" class="btn">@lang('welcome.explore_now')</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-11">
                <div class="for-container ">
                    <div class="overlay2"></div>
                    <img class="img-fluid" src="{{ asset('images2/women.jpg') }}" alt="">
                    <div class="caption">
                        <h3 data-aos="fade-up">@lang('welcome.WATCHES_FOR_HER')</h3>
                        <a  data-aos="fade-left" href="{{route('forHer')}}" class="btn">@lang('welcome.explore_now')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
<div class=" container-fluid bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12  mb-5">
            <div class="row justify-content-between align-items-center">
                <h2 class="underline-text text-blue">@lang('welcome.new_arrivals')</h2>
                <a href="{{route('newArrivals')}}" class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @foreach($newProducts as $item)
               
                @include('components.products.item1' , [$item])
                  @endforeach
                
            </div>
        </div>
    </div>
</div>
<!--End New Arrivals -->


<div class=" container-fluid bg-white">
    <div class="row p-md-5 p-5">
        <div class="col-12 mb-5">
            <div class="row justify-content-between align-items-center">
                <h2 class="underline-text text-blue">@lang('welcome.top_sales')</h2>
                <a href="{{route('topSales')}}" class="text-grey">@lang('welcome.explore_more')</a>
            </div>
        </div>
        <div class="col-12">
            <div class="row p-2">
                @if($topSalesProducts)
                @foreach($topSalesProducts as $item)
                @include('components.products.item1' , ['item'=>$item->product])
                @endforeach
               @endif
               
              
            </div>
        </div>
    </div>
</div>
   

