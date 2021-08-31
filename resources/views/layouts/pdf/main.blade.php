<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('assets/images/ces.png')}}" type="image/x-icon">
    <style>
        @font-face {
            font-family: OpenSans-Regular;
            src: url({{asset('fonts/OpenSans/OpenSans-Regular.ttf')}});
        }

        .limiter {
            width: 100%;
        }

        body{
            font-family: 'Open Sans', sans-serif;
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        table * {
            position: relative;
        }
        table td, table th {
            text-align: center;
            padding-left: 8px;
        }
        table thead tr {
            height: 60px;
            background: #36304a;
        }
        table tbody tr {
            height: 50px;
        }
        table tbody tr:last-child {
            border: 0;
        }
        table td, table th {
            text-align: left;
        }
        table td.l, table th.l {
            text-align: right;
        }
        table td.c, table th.c {
            text-align: center;
        }
        table td.r, table th.r {
            text-align: center;
        }


        .table100-head th{
            font-size: 18px;
            text-align: center;
            color: #fff;
            line-height: 1.2;
            font-weight: unset;
        }

        tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tbody tr {
            font-size: 15px;
            color: #808080;
            line-height: 2.2;
            font-weight: unset;
        }

        tbody tr:hover {
            color: #555555;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        tbody td {
            text-align: center;
        }

        tbody .text-left {
            text-align: left;
        }

        .red{
            color: darkred;
        }

        .green{
            color: darkgreen;
        }

        .header{
        }


        .header h1{
            text-align: center;
            color: #36304a;
        }

        .header h3{
            text-align: center;
            color: #555555;
        }

        .footer{
            align-items: baseline;

            margin-top: 200px;
        }

        .footer .center{
            margin-left: 60px;
            margin-right: 60px;
        }
        .footer span span{
            font-weight: bold;
        }

    </style>
</head>
<body>
<?php
    $path = 'assets/images/ces.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<div class="header">
{{--    <img src="<?php echo $base64?>" width="100" height="100"/>--}}
    <h1>Course Evaluation System (CES)</h1>
    <h3>@yield('pdf-title')</h3>
</div>

<hr>
<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<hr>
<div class="footer">
    <span>Date: <span>{{date('d/m/Y')}}</span></span>
    <span class="center">Sign:..................................... </span>
    <span>Stamp:.................................... </span>
</div>
</body>
</html>
