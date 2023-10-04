<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield("head")
    <meta name="author" content="Marcelo Silveira (48) 99977-5791">
    <meta name="Reply-to" content="marcelodainternet@gmail.com">
    <meta name="theme-color" content="#1f2627">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1f2627">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-3.2.0/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/font-awesome-4.2.0/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/basic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="manifest" href="{{asset('adm/manifest.json')}}">

</head>

<body>
    <div id="wrapper">
        @include('admin.includes.menu')
        <div id="page-wrapper" style="padding: 30px;">
            <div id="page-inner" style="margin:0; padding: 15px 30px;">
                @yield("content")
            </div>
        </div>
             @include('admin.includes.footer')
   </div>
</body>

</html>