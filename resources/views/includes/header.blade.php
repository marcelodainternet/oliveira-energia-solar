<header id="header" class="fixed-top d-flex align-items-center section-bg">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo">
            <!-- <h1><a href="index.html">My<span>Biz</span></a></h1>-->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{url('/')}}">
                <img src="{{asset('assets/img/logo2.png')}}" alt="" class="img-fluid">
            </a>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{$configuracao['telefone']}}&text={{$configuracao['whatstxt']}}">
                <img src="{{asset('assets/img/icon-whats.gif')}}" width="42" class="d-md-none" style="margin-left:40px; margin-top:-7px; " data-aos="fade-left">
            </a>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="{{url('/#')}}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{url('/#home')}}">Energia Solar</a></li>
            <li><a class="nav-link scrollto " href="{{url('/#portfolio')}}">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="{{url('/#empresa')}}">Quem Somos</a></li>
            <li class="dropdown"><a><span>Extras</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="{{url('/dicas')}}">Dicas</a></li>
                <li><a href="{{url('/videos')}}">Vídeos</a></li>
                <li><a href="{{url('/faq')}}">F.A.Q.</a></li>
                <!--   
                    <li><a href="downloads.php">Downloads</a></li>
                        <li class="dropdown"><a href="#"><span>Extras</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="#">Dicas</a></li>
                        <li><a href="#">Vídeos</a></li>
                        <li><a href="#">Donwnloads</a></li>
                        <li><a href="#">F.A.Q.</a></li>
                        </ul>
                    </li>
                -->
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="{{url('/#contato')}}">Contato</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>