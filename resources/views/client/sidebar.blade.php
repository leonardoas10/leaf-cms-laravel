<div class="col-md-4 sidebar-margin-left sidebar-margin-top">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>{{ __('sidebar.tag_search') }}</h4>
        <form action="/" method="post">
            @csrf
            <div class="input-group">
                <input name="search" type="text" class="form-control input-background" placeholder="{{ __('sidebar.tag_search_placeholder') }}">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default search-button" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Login -->
    <div class="well">
        @if (Auth::check())
            <div class="text-center">
                <h4>{{ __('login.logged_in_as') }} {{Auth::user()->username}}</h4>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class=" row">
                    <div class="col-md-5 logout-button-index">
                            <button type="submit" class="form-control btn btn-primary btn-block login-button ">{{ __('login.logout') }}</button> 
                    </div>
                </div>           
            </form>
        @else
            <h4>{{ __('login.login') }}</h4>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-background" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail') }}" required >
                        
                    </div>
                </div>
                <div class="form-group row form-group-less-margin">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-background" name="password" placeholder="{{ __('login.password_placeholder') }}" required >
                    </div>
                </div>
                <div class="form-group row form-group-less-margin">
                    <div class="text-center">
                        @error('email')
                            <span class="invalid-feedback red-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row margin-bottom-more-complete-register">
                    <div class="col-md-7 offset-md-2 forgot-link  col-centered">
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
            </form> 
            <div class="form-group row mb-0 form-group-less-margin">
                <div class="col-md-7 offset-md-2  col-centered ">
                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary margin-left-for-facebook-login-iphone-6s"><i class="fa fa-facebook margin-right-more-facebook-icon"></i> {{__('auth.login_with')}} Facebook</a>
                </div>
            </div>
        @endif
    </div>
    @include('client/widget')
</div>


