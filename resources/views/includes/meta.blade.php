<!-- Basico -->
<link rel="canonical" href="https://{{$configuracao['site']}}">
<meta name="description" content="{{$configuracao['descricao']}}">
<meta name="keywords" content="{{$configuracao['p_chaves']}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
<meta name="theme-color" content="{{$configuracao['cor']}}">
<meta name="msapplication-TitleColor" content="{{$configuracao['cor']}}">
<meta name="msapplication-TitleImage" content="{{asset('assets/img/favicon.png')}}">
<link rel="manifest" href="{{asset('manifest.json')}}">

<!-- Marcação Google para autor e publicador -->
<meta name="author" content="Marcelo Silveira (48) 99977-5791">
<link rel="author" href="https://plus.google.com/[Google+_Profile]/posts"/>
<meta name="Reply-to" content="marcelodainternet@gmail.com">
<meta name="generator" content="">
<link rel="publisher" href="https://plus.google.com/[Google+_Page_Profile]"/>  
  
<!-- Marcações Schema.org para Google -->
<meta itemprop="name" content="{{$configuracao['titulo']}}">
<meta itemprop="description" content="{{$configuracao['descricao']}}">
<meta itemprop="image" content="{{asset('assets/img/favicon.png')}}">

<!-- Marcação Apple -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="With Manifest">
<meta name="apple-mobile-web-app-status-bar-style" content="{{$configuracao['cor']}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/img/favicon.png')}}">
 
<!-- Marcações para Twitter Card -->
<meta name="twitter:card" content="{{$configuracao['titulo']}}">
<meta name="twitter:site" content="https://{{$configuracao['site']}}">
<meta name="twitter:title" content="{{$configuracao['titulo']}}">
<meta name="twitter:description" content="{{$configuracao['descricao']}}">
<meta name="twitter:image" content="{{asset('assets/img/favicon.png')}}">
<meta name="twitter:creator" content="@marcelodaintern">

<!-- Marcações Open Graph / Facebook -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="{{$configuracao['titulo']}}" />
<meta property="og:url" content="https://{{$configuracao['site']}}" />
<meta property="og:title" content="{{$configuracao['titulo']}}" />
<meta property="og:description" content="{{$configuracao['descricao']}}" />
<meta property="og:image" content="{{asset('assets/img/favicon.png')}}" />
<meta property="og:image:secure_url" content="{{asset('assets/img/favicon.png')}}" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" />
<meta property="og:image:alt" content="{{$configuracao['titulo']}}" />  

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