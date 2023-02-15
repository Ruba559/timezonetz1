@extends('voyager::master')

@section('css')
    <style></style>
    @livewireStyles
@stop

@section('page_title', 'Your title')

@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-home"></i>
        Whole Pricing
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content container-fluid">
<div class="container title">
   
   @livewire('whole-pricing' , ['products'=> $products])

</div>
</div>

@livewireScripts
@stop



