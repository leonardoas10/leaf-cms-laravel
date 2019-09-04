@extends('admin.adminlayout')
@section('content')

<form action="{{ route('users.edit', $user->id ) }}">
    @csrf
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input id="firstname" type="text" class="form-control input-background" name="firstname" value="{{$user->firstname}}">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input id="lastname" type="text" class="form-control input-background" name="lastname" value="{{$user->lastname}}">
    </div>
    <div class="form-group">
            <label for="role">Role</label>
            <input id="role" type="text" class="form-control input-background" name="role" value="{{$user->role}}">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="text" class="form-control input-background" name="username" value="{{$user->username}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control input-background" name="email" value="{{$user->email}}">
    </div>      
    <div class="form-group ">
        <div class="col-md-1 col-centered ">
            <input class="btn btn-success submit-buttons" type="submit" name="edit_user" value="Edit Your User Here">
        </div>
    </div>
</form>

@endsection