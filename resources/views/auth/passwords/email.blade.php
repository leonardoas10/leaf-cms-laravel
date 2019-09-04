@extends('client.layout')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body login-card">
                    <div class="text-center">
                        <h3><i class="fa fa-user fa-4x"></i></h3>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">{{ __('Reset Password') }}</h2>
                    <div class="panel-body">
                        <form action="{{ route('password.email') }}" id="register-form" role="form" autocomplete="off" class="form" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>
                                <div class=" col-md-6">    
                                    <input id="email" type="email" class="form-control input-background @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>  
                            </div>
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary  forgot-button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                            <input type="hidden" class="hide" name="token" id="token" value="">
                        </form>
                    <div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@endsection

