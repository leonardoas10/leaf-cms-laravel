@extends('client.layout')
@section('content')

<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1 class="text-center">Register</h1>
                        <form role="form" action="{{ route('registration.store') }}" method="post" id="login-form" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="firstname" id="firstname" class="form-control input-background" placeholder="FirstName">
                                {{-- <p for=""><php echo isset($error['firstname']) ? $error['firstname'] : '' ?></> --}}
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" id="lastname" class="form-control input-background" placeholder="Lastname">
                            </div>
                            <div class="form-group">    
                                <input type="text" name="username" id="username" class="form-control input-background" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-background" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="key" class="form-control input-background" placeholder="Password">
                            </div>
                            <input type="submit" name="submit" id="btn-login" class="register-button btn btn-custom btn-lg btn-block " value="Register">
                        </form>
                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
@endsection