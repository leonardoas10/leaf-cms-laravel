@extends('admin.adminlayout')
@section('content')


<form action="{{ route('users.update', $user->id ) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="col-centered">
        <div class="col-md-4">
            <div class="form-group">
            <label for="firstname">{{__('user.firstname')}}</label>
                <input id="firstname" type="text" class="form-control input-background" name="firstname" value="{{$user->firstname}}">   
            </div>
            <div class="form-group">
                @error('firstname')
                    <span class="invalid-feedback red-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastname">{{__('user.lastname')}}</label>
                <input id="lastname" type="text" class="form-control input-background" name="lastname" value="{{$user->lastname}}">
            </div>
            <div class="form-group ">
                @error('lastname')
                    <span class="invalid-feedback red-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if (Auth::user()->provider === null)
                <div class="form-group">
                    <label for="username">{{__('user.username')}}</label>
                    <input id="username" type="text" class="form-control input-background" name="username" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    @error('username')
                        <span class="invalid-feedback red-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endif
            <div class="form-group">
                <label for="password">{{__('user.password')}}</label>
                <input autocomplete="off" type="password" class="form-control input-background" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{__('user.confirm_password')}}</label>
                <input autocomplete="off" type="password" class="form-control input-background" name="password_confirmation">
            </div>
            <div class="form-group">
                @error('password')
                    <span class="invalid-feedback red-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="flex-wrap">
                @if ($user->provider_id === null)
                    <div class="col-md-8 col-centered text-center">
                        <label for="image" class="">{{__('user.profile_image')}}</label>
                        <input type="file" class="form-control input-background" name="image">
                        <br>
                    </div>
                @endif
                <div class="panel-body profile-card col-centered border-image">
                    @if ($user->image === null)
                        <span><i class="fa fa-camera"></i> {{__('user.photo')}}</span>
                    @elseif($user->provider_id > 1)
                        <img class="img-fluid-profile border-image" src="{{$user->image}}" alt="">
                    @else
                        <img class="img-fluid-profile border-image" src="{{asset('images/' . $user->image)}}" alt="profile photo">
                    @endif
                </div>
                <br>
                <div class="col-centered">
                    <input class="btn btn-success submit-buttons" type="submit" name="edit_user" value="{{__('user.edit_user')}}"> 
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="text-center margin-top-quote">      
                <p><i class="fa fa-quote-left"></i> {{__('user.quote_1')}}</p>
                <p>{{__('user.quote_2')}}</p>
                <p>{{__('user.quote_3')}} <i class="fa fa-quote-right"></i></p>
                <p>{{__('user.quote_4')}}</p>
            </div>
            <p class="margin-top-quote text-center">{{__('user.this_website')}}</p>
        </div> 
    </div> 
</form>
@endsection