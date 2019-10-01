@extends('client.layout')
@section('content')

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-centered">
            <div class="panel panel-default">
                <div class="panel-body login-card">
                    <div class="text-center">
                        <h3 class="justify-i"><i class="fa fa-unlock fa-4x "></i></h3>
                        <h2 class="text-center margin-out"><i class="fa fa-quote-left"></i> You're already Log In! <i class="fa fa-quote-right "></i></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
