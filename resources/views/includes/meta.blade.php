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
<meta name="msapplication-TitleImage" content="{{asset('imagens/favicon.png')}}">
<meta name="msapplication-TitleColor" content="{{$configuracao['cor']}}">
<meta name="theme-color" content="{{$configuracao['cor']}}">

<link rel="manifest" href="manifest.json">
<link rel="canonical" href="https://{{$configuracao['site']}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('imagens/favicon.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('imagens/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('imagens/favicon.png')}}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
<link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">