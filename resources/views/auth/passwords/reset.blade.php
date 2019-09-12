@extends('client.layout')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row form-group-less-margin">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body login-card">
                    <div class="text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2>{{ __('Reset Password') }}</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row form-group-less-margin">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control input-background @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin ">
                                <div class="col-md-9 col-right">
                                    @error('email')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control input-background @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin ">
                                
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control input-background" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary login-button">
                                    {{ __('Reset Password') }}
                                </button>
                                
                            </div>
                            @error('password')
                                <span class="invalid-feedback red-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@endsection

