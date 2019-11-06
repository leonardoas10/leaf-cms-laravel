@extends('client.layout')
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="linkedin-link" href="{{ route('show_pdf') }}" target="_blank" ><i class="fa fa-file-pdf-o"> {{__('about.download_description')}}</i></a>
            <div class="panel-body login-card">
                <div class="text-center">
                    <h4 class="navbar-title">LEAF SHARED</h4>
                    <h5 class="text-justify">
                        <p>{{__('about.purpose')}}</p>
                        <p>{{__('about.builted_with')}}</p>
                    </h5>   
                    <ul class="text-left text-justify">
                        <li>{{__('about.asset_1')}}</li>
                        <br>
                        <li>{{__('about.asset_2')}}</li>
                        <br>    
                        <li>{{__('about.asset_3')}}</li>
                        <br>
                        <li>{{__('about.asset_4')}}</li>
                        <br>
                        <li>{{__('about.asset_5')}}</li>
                        <br>
                        <li>{{__('about.asset_6')}}</li>
                        <br>
                        <li>{{__('about.asset_7')}}</li>
                        <br>
                        <li>{{__('about.asset_8')}}</li>
                        <br>
                        <li>{{__('about.asset_9')}}</li>
                        <br>
                        <li>{{__('about.asset_10')}}</li>
                        <br>
                        <li>{{__('about.asset_11')}}</li>
                    </ul>
                    <a class="linkedin-link" href="{{route('privacy-policy')}}">{{ __('auth.privacy_policy') }}</a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@endsection


