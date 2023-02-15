@extends('layouts.master', ['title' => 'Time Zone | Shopping Cart',"nav_bl"=>true])


@section('head')

<style>
    .cart-img-container {
        position: relative;
    }

    .deleter {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 80%;
        height: 100%;
        transform: translate(-50%, -50%);
        margin: auto;
        border-radius: 20px;
        background-color: rgba(59, 59, 59, 0.308);
        display: none;
        transition: ease-in all .2s;
        z-index: 5;
        color: white;
        text-align: center;
        vertical-align: center;
        font-size: larger
    }

    .deleter span {
        margin: auto;
    }

    .cart-img-container:hover>.deleter {
        display: flex;
        justify-content: center;
    }
</style>
@endsection

@section('body')


<div class="container-fluid my-3 my-5">
    <div class="row justify-content-center p-md-5 p-2">

        <div class="col-md-10 col-12">

            <ul class="nav nav-tabs " id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><span class="fa fa-shopping-cart mx-1"></span>Cart</button>
                </li>
                @auth()
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><span class="fa fa-file mx-1"></span> Orders</button>
                </li>
                @endauth()
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active home container-fluid" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <section class="h-100 gradient-custom">

                        <div class="row d-flex justify-content-start my-4">
                            <div class="col-12">

                                @livewire('user-cart')

                            </div>
                        </div>

                    </section>
                </div>
                @if($orders)
                <div class="tab-pane fade profile " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row d-flex justify-content-start my-4">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header bg-grey text-white  py-3">
                                    @lang('cart.orders')
                                </div>
                                <div class="card-body">
                                    <div class="radius-20 p-md-3 p-2 table-responsive" style="border:thin rgba(255, 255, 255, 0.2) solid">

                                        <table class="table ">
                                            <thead class="">
                                                <tr class="f-bold">
                                                    <th>@lang('cart.order_number')</th>
                                                    <th>@lang('cart.total_price')</th>
                                                    <th>@lang('cart.products')</th>
                                                    <th>@lang('cart.status')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $item)
                                                <tr class="text-white70">
                                                    <td>{{ $item->id }}</td>

                                                    <td>{{ $item->total_price }}</td>
                                                    <td><button type="button" class="btn bg-gold text-white" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}">
                                                            @lang('order_details.order_details')
                                                        </button>
                                                        <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        <table class="table ">
                                                                            <tr class="f-bold">
                                                                                <th> @lang('order_details.image')</th>
                                                                                <th> @lang('order_details.product')</th>
                                                                                <th> @lang('order_details.price')</th>
                                                                                <th> @lang('order_details.quantity')</th>
                                                                                <th> @lang('order_details.total_price_product')</th>
                                                                            </tr>

                                                                            <tbody>
                                                                                @foreach ($item->details as $item2)
                                                                                <tr class="text-white70">
                                                                                    <td> <img src="{{asset('storage/'.json_decode($item2->product->images, true)[0])}}" width="80px" hieght="80px" class="img-fluid img-thumbnail rounded-circle" alt="Sheep"></td>
                                                                                    <td>{{ $item2->product->name }}</td>
                                                                                    <td>{{ $item2->price }}</td>
                                                                                    <td>{{ $item2->quantity }}</td>
                                                                                    <td>{{ $item2->total_price }}</td>
                                                                                    @endforeach

                                                                            </tbody>

                                                                        </table>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    @if ($item->status == 0)
                                                    <td> @lang('cart.processing')</td>
                                                    @endif
                                                    @if ($item->status == 1)
                                                    <td> @lang('cart.buying_done')</td>
                                                    @endif
                                                    @if ($item->status == 2)
                                                    <td> @lang('cart.delivered')</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>



                @endif()
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#home-tab').click(function() {
            $(this).addClass("active");
            $('#profile-tab').removeClass("active");
            $('.profile').removeClass("active").removeClass("show");
            $('.home').addClass("active").addClass("show");

        });

        $('#profile-tab').click(function() {
            $(this).addClass("active");
            $('#home-tab').removeClass("active");
            $('.home').removeClass("active").removeClass("show");
            $('.profile').addClass("active").addClass("show");

        });
    });
</script>
@endsection