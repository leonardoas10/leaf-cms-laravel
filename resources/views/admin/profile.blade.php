@extends('admin.adminlayout')
@section('content')

<form action="{{ route('users.edit', $user->id ) }}">
    @csrf
    <div class="col-centered">
        <div class="col-md-2 col-without-padding ">
            <div class="panel-body profile-card col-centered">
                @if ($user->image === null)
                    <span><i class="fa fa-camera"></i> Photo</span>
                @elseif($user->provider_id > 1)
                    <img class="img-fluid-profile" src="{{$user->image}}" alt="">
                @else
                    <img class="img-fluid-profile" src="{{asset('images/' . $user->image)}}" alt="profile photo">
                @endif
            </div>
            <div class="flex-wrap">
                <span class="text-center">Become a member since:</span>
                <span class="text-center">{{$user->created_at}}</span>
                <br>
                <input class="btn btn-success submit-buttons form-control" type="submit" name="edit_user" value="Edit Your User Here">
            </div>
        </div>
        <div class="col-md-6 flex-wrap">
            <label for="firstname">Firstname</label>
            <span class="form-control input-background">{{$user->firstname}}</span>

            <label for="lastname">Lastname</label>
            <span class="form-control input-background">{{$user->lastname}}</span>

            <label for="role">Role</label>
            <span class="form-control input-background">{{$user->role}}</span>

            <label for="username">Username</label>
            <span class="form-control input-background">{{$user->username}}</span>

            <label for="email">Email</label>
            <span class="form-control input-background">{{$user->email}}</span>
        </div>  
        <div class="col-md-4">
            <div class="text-center margin-top-quote">      
                <p><i class="fa fa-quote-left"></i>  When you are resting...</p>
                <p>There is another one who is working to be better at...</p>
                <p>What you want to succeed  <i class="fa fa-quote-right"></i></p>
                <p>...Anonymous </p>
            </div>
            <p class="margin-top-quote text-center">This website was built with Laravel Framework V 5.8.</p>
        </div> 
    </div> 
</form>

@endsection