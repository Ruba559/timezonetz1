@extends('layouts.master',['title'=>$user->name ,"nav_bl"=>true])


@section('head')
    
@endsection

@section('body')
    
<div class="container-fluid my-5">
        <div class="col-12" >
            <div class="row justify-content-center">
          
                <div class="col-md-6 col-sm-8 col-12  my-5">
                    <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="avatar" id="avatar_label">
                                <span  class="fa fa-edit avatar_icon"></span>
                                <img class="img-fluid rounded-circle mx-auto" src="{{asset('storage/'.$user->avatar)}}" width="100px" >
        
                            </label>
                            <input id="avatar" class="form-control" type="file" name="avatar" hidden>
                        </div>
                        <div class="form-group"> 
                            <label for="name">@lang('profile.name')</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('profile.email')</label>
                            <input id="email" class="form-control" type="text" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">@lang('profile.mobile_number')</label>
                            <input id="mobile_number" class="form-control" type="text" name="mobil_number" value="{{$user->mobil_number}}">
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('profile.change_password')</label>
                            <input id="password" class="form-control" type="password" name="password" value="">
                            <small class=" text-white50">@lang('profile.change_password_title')</small>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn bg-gold text-white w-100"  type="submit">@lang('profile.submit')</button>
                    </form>
                </div>
            
        </div>
      
    </div>
</div>
@endsection