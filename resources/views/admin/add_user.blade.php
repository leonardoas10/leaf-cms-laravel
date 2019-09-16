@extends('admin.adminlayout')
@section('content')
<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="firstname">{{__('user.firstname')}}</label>
        <input type="text" class="form-control input-background" name="firstname" value="{{ old('firstname') }}"> 
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
        <input type="text" class="form-control input-background" name="lastname" value="{{ old('lastname') }}">
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
            <option value="Subscriber">{{__('user.select_options')}}</option>
            <option value="Admin">{{__('user.admin')}}</option>
            <option value="Subscriber">{{__('user.subscriber')}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">{{__('user.profile_image')}}</label>
        <input type="file" class="form-control input-background" name="image">
    </div>
    <div class="form-group">
        <label for="username">{{__('user.username')}}</label>
        <input type="text" class="form-control input-background" name="username" value="{{ old('username') }}">
    </div>
    <div class="form-group">
        @error('username')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">{{__('user.email')}}</label>
        <input type="email" class="form-control input-background" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        @error('email')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
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
    <div class="form-group">
    <input class="btn btn-success submit-buttons" type="submit" value="{{__('user.add_user')}}">
    </div>
</form>
@endsection