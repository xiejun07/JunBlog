<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{asset('org/bootstrap-3.3.7/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('admin/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('admin/font/css/font-awesome.min.css/')}}">
    <link rel="stylesheet" href="{{asset('org/bootstrap-3.3.7/daterangepicker.css')}}"/>

</head>
<body>

@yield('content')

<script type="text/javascript" src="{{asset('admin/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/ch-ui.admin.js')}}"></script>
<script type="text/javascript" src="{{asset('org/bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('org/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('org/bootstrap-3.3.7/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('org/bootstrap-3.3.7/daterangepicker.js')}}"></script>

@yield('script')

</body>
</html>