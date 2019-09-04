@extends('admin.adminlayout')
@section('content')

<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right"> 
                    <div class='huge'>{{$posts->count()}}</div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="{{route('posts.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <div class='huge'>{{$comments->count()}}</div>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="{{route('comments.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <div class='huge'>{{$categories->count()}}</div>
                        <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="{{route('categories.index')}}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
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
            ["All Posts", {{$posts->count()}}, "#337ab7"],
            ["Active Posts", {{$posts->where('status', '=', 'Published')->count()}}, "#337ab7"],
            ["Draft Posts", {{$posts->where('status', '=', 'Draft')->count()}}, "#337ab7"],
            ["Comments", {{$comments->count()}}, "#5cb85c"],
            ["Pending Comments", {{$comments->where('status', '=', 'Unapproved')->count()}}, "#5cb85c"],
            ["Categories", {{$categories->count()}}, "#d9534f"],
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


