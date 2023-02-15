<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $locale = app()->getLocale();
        
    @endphp
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title : setting('site.title') }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <meta name="description" content="{{ isset($desc) ? $desc : setting('site.description') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.slim.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        media="screen" />

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($locale == 'ar' ? 'css/main-rtl.css' : 'css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>


@livewireStyles

</head>

<body {{$locale=='ar' ? 'dir=rtl' : ''}}>
    <nav class="navbar navbar-expand-sm fixed-top {{isset($nav_bl)? 'bg-black mb-5' : ''}}">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('homepage')}}"><img class="img-fluid" width="180px" src="{{ asset('images2/logo-gold.png') }}"
                    alt="" /></a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse mx-auto ">
                <ul class="navbar-nav first-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('homepage')}}">@lang('master.home') <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link dropdown" href=""><span class=" dropdown-toggle" type="button" data-toggle="dropdown">@lang('master.brands')</span><ul class="dropdown-menu">
                           @foreach ($brands as $item)
                               <li class="dropdown-item">
                                <a class="nav-link" href="{{route('brand' , $item->slug)}}">

                                <div class="row align-items-center flex-nowrap">
                                    <img class="img-fluid" width="50px" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <p class="align-self-center my-auto">{{$item->name}}</p>
                               
                                </div>
                                </a>
                               </li>
                           @endforeach
                          </ul></div>
                       
                    </li>
                    <li class="nav-item ">
                        <div class="nav-link dropdown" href=""><span class=" dropdown-toggle" type="button" data-toggle="dropdown">@lang('master.categories')</span><ul class="dropdown-menu">
                           @foreach ($categories as $item)
                               <li class="dropdown-item">
                                <a class="nav-link"href="{{route('category' , $item->slug)}}">

                                <div class="row align-items-center flex-nowrap">
                                    
                                    <img class="img-fluid" width="50px" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <p class="align-self-center my-auto">{{$item->getTranslatedAttribute('name')}}</p>
                                </div>
                                </a>
                               </li>
                           @endforeach
                          </ul></div>
                       
                    </li>
                   
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('newArrivals')}}">@lang('master.new_arrivals')<span class="sr-only">(current)</span></a></li>
                        <li class="nav-item ">
                        <a class="nav-link" href="{{route('Offers')}}">@lang('master.special_offer')<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="{{$locale=='ar' ? 'mr-auto' : 'ml-auto'}}  navbar-nav"> 
                    <li class="nav-item">
                        @livewire('cart-icon')
                     </li>
                     <li class="nav-item"> <a class="nav-link" href="{{route('favorite')}}"><span class="fa fa-heart"></span></a></li>
                     
                   
                      
                     <li class="nav-item"> <a class="nav-link" href="{{route('profile')}}"><span class="fa fa-user-circle-o"></span></a></li>
                   
                </ul>
            </div>
        </div>
    </nav>

    @yield('body')

    
<footer class="container-fluid">
    <div class="row justify-content-start align-items-center">
        <div class="col-md-3 col-12 text-center p-md-2 p-5">
            <img src="{{asset('images2/logo-gold.png')}}" class="img-fluid" width="50%" alt="">
            <p class="mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            </p>
        </div> 
        <div class="col-md-3 col-6 align-self-start">
            <ul>
             @lang('master.quick_links')
                <li><a href="{{route('homepage')}}">@lang('master.home')</a></li>
                <li><a href="">@lang('master.new_arrivals')</a></li>
                <li><a href="">@lang('master.big_deals')</a></li>
                <li><a href="">@lang('master.categories')</a></li>
                <li><a href="">@lang('master.top_viewed')</a></li>

                
            </ul>
        </div>
        <div class="col-md-3 col-6 align-self-start">
            <ul>
             @lang('master.legal')
                <li><a href="{{route('legals')}}"> @lang('master.privacy_policy')</a></li>
                <li><a href="">@lang('master.terms_condetions')</a></li>
                <li><a href="">@lang('master.about_us')</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-12 ">
            <div class="text-center">
                <p class="my-2">@lang('master.find_us')</p>
                <div class="social-links text-white">
                    <a href=""><span class="fa fa-facebook fa-2x mx-2"></span></a>
                    <a href=""><span class="fa fa-whatsapp fa-2x mx-2"></span></a>
                    <a href=""><span class="fa fa-envelope-o fa-2x mx-2"></span></a>
                </div>
               

            </div>
        </div>
    <div class="col12 d-block d-md-none d-sm-block" style="height: 50px">
        
    </div>
    </div>
</footer>


    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/hash.js') }}"></script>
    <script>
        $(document).ready(function() {
            checkscroll();
            $(window).scroll(function() {
                checkscroll();
            });
            $('.fa-heart-o').parent().click(function(e){
                e.preventDefault();
                $(this).find('span').toggleClass('fa-heart-o');
                $(this).find('span').toggleClass('fa-heart');
            });

        });

        function checkscroll() {
            var isblack = "{{isset($nav_bl)}}";
            var scroll = $(window).scrollTop();
            var wwidth = $(window).width();


            if (scroll > 100) {
                $('.navbar').addClass('bg-black border-gold');
            } else {
                if(!isblack){
                    $('.navbar').removeClass('bg-black border-gold');

                }
            }

        };
    </script>
      <script>
        AOS.init({
            easing: "ease-out"
        });
    </script>
    @livewireScripts
</body>

</html>