@extends('layouts.master',['title'=>'Time Zone | '.Lang::get('welcome.top_brands'),"nav_bl"=>true])


@section('head')
  
@endsection

@section('body')
    
<div class="container-fluid my-5">
    
        <div class="row p-md-5 p-2 bg-white">
            <div class="col-12 mb-5">
                <h4 class="underline-text text-blue d-inline">@lang('welcome.top_brands')</h4>
            </div>
            
            <div class="col-12 p-md-5 p-2">
            <div class="row">
                        @foreach ($brands as $item)
                      
                            <div class="col-4">
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
@endsection