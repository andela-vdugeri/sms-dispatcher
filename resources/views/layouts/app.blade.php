<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{!! csrf_token() !!}">
<link rel="stylesheet" href="{!! asset('css/bootstrap.css') !!}">
<link rel="stylesheet" href="{!! secure_asset('css/bootstrap.css') !!}">
<link rel="stylesheet" href="{!! asset('css/bootstrap-theme.css') !!}">
<link rel="stylesheet" href="{!! secure_asset('css/bootstrap-theme.css') !!}">
<link href="{!! asset('css/preload.css') !!}" rel="stylesheet">
<link href="{!! secure_asset('css/preload.css') !!}" rel="stylesheet">
<link href="{!! asset('css/toastr.min.css') !!}" rel="stylesheet">
<link href="{!! secure_asset('css/toastr.min.css') !!}" rel="stylesheet">
<link href="{!! asset('css/vendors.css') !!}" rel="stylesheet">
<link href="{!! secure_asset('css/vendors.css') !!}" rel="stylesheet">
<link href="{!! asset('css/syntaxhighlighter/shCore.css') !!}" rel="stylesheet" >
<link href="{!! secure_asset('css/syntaxhighlighter/shCore.css') !!}" rel="stylesheet" >
<link rel="stylesheet" href="{!! asset('css/font-awesome.css') !!}">
<link rel="stylesheet" href="{!! secure_asset('css/font-awesome.css') !!}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css" type="text/css">
<link href="{!! asset('css/style-blue.css') !!}" rel="stylesheet" title="default">
<link href="{!! secure_asset('css/style-blue.css') !!}" rel="stylesheet" title="default">
<link href="{!! asset('css/width-full.css') !!}" rel="stylesheet" title="default">
<link href="{!! secure_asset('css/width-full.css') !!}" rel="stylesheet" title="default">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<link href="{!! asset('css/sweetalert.css') !!}" rel="stylesheet">
<link href="{!! secure_asset('css/sweetalert.css') !!}" rel="stylesheet">
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
<script src="{!! secure_asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/npm.js') !!}"></script>
<script src="{!! secure_asset('js/npm.js') !!}"></script>
<script src="{!! asset('js/bootstrap.js') !!}"></script>
<script src="{!! secure_asset('js/bootstrap.js') !!}"></script>
<script src="{!! asset('js/toastr.min.js') !!}"></script>
<script src="{!! secure_asset('js/toastr.min.js') !!}"></script>
<script src="{!! asset('js/messages.js') !!}"></script>
<script src="{!! secure_asset('js/messages.js') !!}"></script>
<script src="{!! asset('js/login.js') !!}"></script>
<script src="{!! secure_asset('js/login.js') !!}"></script>

<script src="{{ asset('js/vendors.js') }}"></script>
<script src="{{ secure_asset('js/vendors.js') }}"></script>

<script src="{{ asset('js/styleswitcher.js') }}"></script>
<script src="{{ secure_asset('js/styleswitcher.js') }}"></script>
<script src="{{ asset('js/application.js') }}"></script>
<script src="{{ secure_asset('js/application.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ secure_asset('js/sweetalert.min.js') }}"></script>

<!-- Syntaxhighlighter -->
<script src="assets/js/syntaxhighlighter/shCore.js"></script>
<script src="assets/js/syntaxhighlighter/shBrushXml.js"></script>
<script src="assets/js/syntaxhighlighter/shBrushJScript.js"></script>

<script src="assets/js/app.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
</body>
</html>