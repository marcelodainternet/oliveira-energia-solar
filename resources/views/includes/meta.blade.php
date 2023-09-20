<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="description" content="{{$configuracao['descricao']}}">
<meta name="keywords" content="{{$configuracao['p_chaves']}}">
<meta name="author" content="Marcelo Silveira (48) 99977-5791">
<meta name="Reply-to" content="marcelodainternet@gmail.com">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="{{$configuracao['cor']}}">

<meta name="apple-mobile-web-app-title" content="With Manifest">
<meta name="msapplication-TitleImage" content="{{asset('assets/img/favicon.png')}}">
<meta name="msapplication-TitleColor" content="{{$configuracao['cor']}}">
<meta name="theme-color" content="{{$configuracao['cor']}}">

<link rel="manifest" href="manifest.json">
<link rel="canonical" href="https://{{$configuracao['site']}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('img/favicon.png')}}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('assets/libs/animate.css/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">