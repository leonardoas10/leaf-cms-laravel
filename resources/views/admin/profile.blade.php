@extends('admin.adminlayout')
@section('content')

<form action="{{ route('users.edit', $user->id ) }}">
    @csrf
    <div class="col-centered">
        <div class="col-md-2 col-without-padding ">
            <div class="panel-body profile-card col-centered">
                @if ($user->image === null)
                    <span><i class="fa fa-camera"></i>{{__('user.photo')}}</span>
                @elseif($user->provider_id > 1)
                    <img class="img-fluid-profile" src="{{$user->image}}" alt="">
                @else
                    <img class="img-fluid-profile" src="{{asset('images/' . $user->image)}}" alt="profile photo">
                @endif
            </div>
            <div class="flex-wrap">
                <span class="text-center">{{__('user.become_a_member_since')}}:</span>
                <span class="text-center">{{$user->created_at}}</span>
                <br>
            <input class="btn btn-success submit-buttons form-control" type="submit" name="edit_user" value="{{__('user.edit_your_user')}}">
            </div>
        </div>
        <div class="col-md-6 flex-wrap">
            <label for="firstname">{{__('user.firstname')}}</label>
            <span class="form-control input-background">{{$user->firstname}}</span>

            <label for="lastname">{{__('user.lastname')}}</label>
            <span class="form-control input-background">{{$user->lastname}}</span>

            <label for="role">{{__('user.role')}}</label>
            <span class="form-control input-background">{{$user->role}}</span>

            <label for="username">{{__('user.username')}}</label>
            <span class="form-control input-background">{{$user->username}}</span>

            <label for="email">{{__('user.email')}}</label>
            <span class="form-control input-background">{{$user->email}}</span>
        </div>  
        <div class="col-md-4">
            <div class="text-center margin-top-quote">      
                <p><i class="fa fa-quote-left"></i>  {{__('user.quote_1')}}</p>
                <p>{{__('user.quote_2')}}</p>
                <p>{{__('user.quote_3')}} <i class="fa fa-quote-right"></i></p>
                <p>{{__('user.quote_4')}} </p>
            </div>
            <p class="margin-top-quote text-center">{{__('user.this_website')}}</p>
        </div> 
    </div> 
</form>

@endsection