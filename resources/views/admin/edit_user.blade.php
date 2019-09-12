@extends('admin.adminlayout')
@section('content')


<form action="{{ route('users.update', $user->id ) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
    @csrf
    <div class="col-centered">
        <div class="col-md-4">
            <div class="form-group">
                <label for="firstname">Firstname</label>
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
                <label for="lastname">Lastname</label>
                <input id="lastname" type="text" class="form-control input-background" name="lastname" value="{{$user->lastname}}">
            </div>
            <div class="form-group ">
                @error('lastname')
                    <span class="invalid-feedback red-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control input-background" name="username" value="{{$user->username}}">
            </div>
            <div class="form-group">
                @error('username')
                    <span class="invalid-feedback red-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input autocomplete="off" type="password" class="form-control input-background" name="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
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
                <div class="col-md-8 col-centered text-center">
                    <label for="image" class="">Profile Image</label>
                    <input type="file" class="form-control input-background" name="image">
                    <br>
                </div>
                <div class="panel-body profile-card col-centered">
                    @if ($user->image === null)
                        <span><i class="fa fa-camera"></i> Photo</span>
                    @elseif($user->provider_id > 1)
                        <img class="img-fluid-profile" src="{{$user->image}}" alt="">
                    @else
                        <img class="img-fluid-profile" src="{{asset('images/' . $user->image)}}" alt="profile photo">
                    @endif
                </div>
                <br>
                <div class="col-md-4 col-centered">
                    <input class="btn btn-success submit-buttons" type="submit" name="edit_user" value="Edit User"> 
                </div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="text-center margin-top-quote">      
                <p><i class="fa fa-quote-left"></i>  When you are resting...</p>
                <p>There is another one who is working to be better at...</p>
                <p>What you want to succeed  <i class="fa fa-quote-right"></i></p>
                <p>...Anonymous </p>
            </div>
            <p class="margin-top-quote text-center">This website was built with Laravel Framework V 5.8.</p>
            <input type="checkbox" data-toggle="toggle">
        </div> 
    </div> 
</form>
@endsection