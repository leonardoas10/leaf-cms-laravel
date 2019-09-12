@extends('client.layout')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-body login-card">
                <div class="text-center">
                    <h3><i class="fa fa-user fa-4x"></i></h3>
                    <h2 class="text-center">{{ __('login.login') }}</h2>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row form-group-less-margin">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-background" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('login.password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-background" name="password" required autocomplete="current-password">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-7 offset-md-2 forgot-link col-centered">
                                    <button type="submit" class="btn btn-primary btn-block login-button ">
                                        {{ __('login.login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn" href="{{ route('password.request') }}">
                                            {{ __('login.forgot') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-14">
                                    @error('email')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        <div class="form-group row mb-0">
                            <div class="col-right">
                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook margin-right-more-facebook-icon"></i> {{__('auth.login_with')}} Facebook</a>
                            </div>
                        </div>
                    </div><!-- Body-->
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@endsection


