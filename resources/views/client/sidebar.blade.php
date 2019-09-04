<div class="col-md-4 sidebar-margin-left">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Tags Search</h4>
        <form action="/" method="post">
            @csrf
            <div class="input-group">
                <input name="search" type="text" class="form-control input-background" placeholder="Search">
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
                <h4>Logged in as: {{Auth::user()->username}}</h4>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class=" row">
                    <div class="col-md-5 logout-button-index">
                            <button type="submit" class="form-control btn btn-primary btn-block login-button ">{{ __('Log Out') }}</button> 
                    </div>
                </div>           
            </form>
        @else
            <h4>Login</h4>
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input-background" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input-background" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 offset-md-2 forgot-link  col-centered">
                        <button type="submit" class="btn btn-primary btn-block login-button ">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form> 
        @endif
    </div>
    @include('client/widget')
</div>


