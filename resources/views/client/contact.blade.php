@extends('client.layout')
@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-wrap">
            @if (\Session::has('success'))
                <div class="alert alert-success success-timer margin-bottom-zero padding-zero size-for-smarthphone text-center">
                    {{Session::get('success') }}
                </div>
            @endif
            <h1 class="text-center">{{ __('contact.contact_us') }}</h1>
                <form role="form" action="{{route('contact.store')}}" method="post" id="login-form" autocomplete="off">
                    @csrf
                    <div class="form-group row form-group-less-margin">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('contact.email') }}</label>
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
                        <label for="subject" class="col-md-3 col-form-label text-md-right">{{ __('contact.subject') }}</label>
                        <div class="col-md-7">
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror input-background" name="subject" value="{{ old('subject') }}" >
                        </div>
                    </div>
                    <div class="form-group row form-group-less-margin">
                        <div class="col-md-9 col-right">
                            @error('subject')
                                <span class="invalid-feedback red-error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="body"></textarea>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-7 col-centered">
                            <button type="submit" class="login-button btn btn-custom btn-lg btn-block ">
                                {{ __('contact.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- /.col-xs-12 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->


@endsection