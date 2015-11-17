<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{!! csrf_token() !!}">
<link rel="stylesheet" href="{!! asset('css/bootstrap.css') !!}">
<link rel="stylesheet" href="{!! asset('css/bootstrap-theme.css') !!}">
<link href="{!! asset('css/preload.css') !!}" rel="stylesheet">
<link href="{!! asset('css/vendors.css') !!}" rel="stylesheet">
<link href="{!! asset('css/syntaxhighlighter/shCore.css') !!}" rel="stylesheet" >
<link rel="stylesheet" href="{!! asset('css/font-awesome.css') !!}">

<link href="{!! asset('css/style-blue.css') !!}" rel="stylesheet" title="default">
<link href="{!! asset('css/width-full.css') !!}" rel="stylesheet" title="default">

<head>

</head>
<body>
    <div class="row">
        <div>
            @yield('nav')
        </div>
        <div>
            @yield('content')
        </div>

        <div>
            @yield('footer')
        </div>
    </div>

<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/npm.js') !!}"></script>
<script src="{!! asset('js/bootstrap.js') !!}"></script>
</body>
</html>