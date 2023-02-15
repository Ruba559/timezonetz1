@extends('layouts.master',['title'=>'Time Zone | '.Lang::get('welcome.WATCHES_FOR_HER'),"nav_bl"=>true])


@section('head')
  
@endsection

@section('body')
    
<div class="container-fluid my-5">
    
        <div class="row p-md-5 p-2 bg-white">
            <div class="col-12 mb-5">
                <h4 class="underline-text text-blue d-inline">@lang('welcome.WATCHES_FOR_HER')</h4>
            </div>
            @foreach ($products as $item)
            @include('components.products.item1' , [$item])
            @endforeach
        </div>
        
</div>
@endsection