@extends('client.layout')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel-body login-card panel-body-less-padding-bottom">
                <div class="text-center">
                    <h3><img class="img-profile-facebook-register" src="{{session()->get('get_info')->avatar}}" alt=""></h3>
                    <h1 class="text-center">{{ __('auth.welcome') }} {{session()->get('get_info')->name}} </h1>
                    <span>{{ __('auth.last_step') }}</span>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('complete.store') }}">
                            @csrf
                            <div class="form-group row form-group-less-margin">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-background" name="password"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin"></div>
                            <div class="form-group row form-group-less-margin ">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.confirm_password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control input-background" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin  margin-bottom-more-complete-register">
                                <div class="col-md-14">
                                    @error('password')
                                        <span class="invalid-feedback red-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row form-group-less-margin">
                                <div class="col-md-7 offset-md-2 forgot-link col-centered">
                                    <button type="submit" class="btn btn-primary btn-block login-button ">
                                            {{ __('auth.join_us') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div><!-- Body-->
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@endsection


