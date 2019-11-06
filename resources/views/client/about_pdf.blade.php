<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .login-card {
            border: 0.5px solid RGB(54, 181, 75); 
            border-radius: 4px;
            padding: 15px;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .navbar-title,{
            color: RGB(54, 181, 75);
            text-align: center;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .t-center {
            text-align: center;
        }
        .t-justify {
            text-align: justify;
        }
        .hr {
            margin-top: 20px;
            border: 0.5px solid RGB(54, 181, 75); 
        }
    </style>
</head>
<body>
    <div class="panel-body login-card">
        <h4 class="navbar-title">LEAF SHARED</h4>
        <div class="t-justify">
            <h5>
                <p>{{__('about.purpose')}}</p>
                <p>{{__('about.builted_with')}}</p>
            </h5>   
            <ul>
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
        </div>
    </div>
    <hr class="hr">
    <p class="t-center">{{ __('auth.developed_by') }} Leonardo AS / {{ __('auth.copyright') }} &copy; Leaf Shared 2019</p>
</body>
</html>