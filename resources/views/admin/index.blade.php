@extends('admin.adminlayout')
@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right"> 
                    <div class='huge'>{{$posts->count()}}</div>
                    <div>{{__('googlechars.posts')}}</div>
                    </div>
                </div>
            </div>
            <a href="{{route('posts.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{__('googlechars.view_details')}}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <div class='huge'>{{$comments->count()}}</div>
                        <div>{{__('googlechars.comments')}}</div>
                    </div>
                </div>
            </div>
            <a href="{{route('comments.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">{{__('googlechars.view_details')}}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
@push('google_chars')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Count", { role: "style" } ],
            ["@lang('googlechars.all_posts')", {{$posts->count()}}, "#337ab7"],
            ["@lang('googlechars.active_posts')", {{$posts->where('status', '=', 'Published')->count()}}, "#337ab7"],
            ["@lang('googlechars.draft_posts')", {{$posts->where('status', '=', 'Draft')->count()}}, "#337ab7"],
            ["@lang('googlechars.comments')", {{$comments->count()}}, "#5cb85c"],
            ["@lang('googlechars.pending_comments')", {{$comments->where('status', '=', 'Unapproved')->count()}}, "#5cb85c"],
        ]);

        var view = new google.visualization.DataView(data);

        var options = {
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
        chart.draw(view, options);    
        }
    </script> 
@endpush

<div class="row">
    <div id="chart_div"  style="width: 'auto'; height: 500px;"></div>
</div>
@endsection


