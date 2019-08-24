@extends('admin.adminlayout')
@section('content')
<form action="{{ route('users.update', $user->id ) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="firstname">Firstname</label>
    <input type="text" class="form-control input-background" name="firstname" value="{{$user->firstname}}">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control input-background" name="lastname" value="{{$user->lastname}}">
    </div>
    <div class="form-group">
        <select name="role" id="" class="input-background">
            <option value="{{$user->role}}">{{$user->role}}</option>
            @if ($user->role === 'Admin')
                <option value='Subscriber'>Subscriber</option>
            @else
                <option value='Admin'>Admin</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control input-background" name="username" value="{{$user->username}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control input-background" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input autocomplete="off" type="password" class="form-control input-background" name="password">
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="edit_user" value="Edit User">
    </div>
</form>
@endsection