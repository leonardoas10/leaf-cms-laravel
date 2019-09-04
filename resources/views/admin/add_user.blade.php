@extends('admin.adminlayout')
@section('content')
<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control input-background" name="firstname"> 
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
        <input type="text" class="form-control input-background" name="lastname">
    </div>
    <div class="form-group">
        @error('lastname')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <select name="role" id="" class="input-background">
            <option value="Subscriber">Select Option</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control input-background" name="username">
    </div>
    <div class="form-group">
        @error('username')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control input-background" name="email">
    </div>
    <div class="form-group">
        @error('email')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control input-background" name="password">
    </div>
    <div class="form-group">
        @error('password')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" value="Add User">
    </div>
</form>
@endsection