@extends('client.layout')

@section('content')

<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1 class="text-center">{{ __('auth.become_a_new_user') }}</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row form-group-less-margin">
                                <label for="firstname" class="col-md-3 col-form-label ">{{ __('auth.firstname') }}</label>
                                <div class="col-md-7">
                                    <input type="text" name="firstname" value="{{ old('firstname') }}" id="firstname" class="form-control input-background">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-9 col-right">
                                    @error('firstname')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="lastname" class="col-md-3 col-form-label text-md-right">{{ __('auth.lastname') }}</label>
                                <div class="col-md-7">
                                    <input type="text" name="lastname" value="{{ old('lastname') }}" id="lastname" class="form-control input-background">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-9 col-right">
                                    @error('lastname')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('auth.username') }}</label>
                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input-background" name="username" value="{{ old('username') }}" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-9 col-right">
                                    @error('username')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('auth.email') }}</label>
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-background" name="email" value="{{ old('email') }}"  autocomplete="email">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-9 col-right">
                                    @error('email')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('auth.password') }}</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-background" name="password"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-9 col-right">
                                    @error('password')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('auth.confirm_password') }}</label>
                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control input-background" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-7 col-centered">
                                    <button type="submit" class="login-button btn btn-custom btn-lg btn-block ">
                                        {{ __('auth.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0">
                            <div class="col-right">
                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> {{__('auth.register_with')}}  Facebook</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
@endsection
