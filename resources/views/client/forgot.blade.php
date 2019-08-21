@extends('client.layout')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body forgot-card">
                        <div class="text-center">

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">
                                <form action="/forgot" id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon "><i
                                                    class="glyphicon glyphicon-envelope color-blue email-icon"></i></span>
                                            <input id="email" name="email" placeholder="Email Address"
                                                class="form-control input-background" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit"
                                            class="btn btn-lg btn-primary btn-block forgot-button"
                                            value="Reset Password" type="submit">
                                    </div>
                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                            </div>
                            {{-- <php else: ?>
                                <h2>Please check your email: <php echo $email?></h2>
                                <php endif; ?> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection