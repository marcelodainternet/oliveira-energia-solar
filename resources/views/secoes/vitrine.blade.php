<section id="vitrine" class="vitrine">
    <div class="vitrine-container">
    <div class="portfolio-details-slider swiper">
        <div class="swiper-wrapper align-items-center">
        @foreach ($vitrine->postagens as $postagem)
            <div class="swiper-slide">
            <img style="min-height:600px; width: 100%;" class="slidevitrine" src="{{asset('imagens/postagens/grande/'.$postagem->id.'.1.jpg')}}" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}">
            <div class="carousel-container carousel-item">
                <div class="carousel-content col-10">
                <h2 class="scrollto animate__animated animate__fadeInUp">{{$postagem->titulo}}</h2>
                <h3 class="scrollto animate__animated animate__fadeInUp mb-4" style="color: {{$configuracao['cortxt4']}};">{{$postagem->subtitulo}}</h3>
                <div class="scrollto animate__animated animate__fadeInUp">{!!$postagem->descricao!!}</div>
                <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{$postagem->telefone}}&text={{$postagem->whatstxt}}" class="btn-get-started scrollto animate__animated animate__fadeInUp">
                    Saber mais...
                    <img src="{{asset('imagens/icon-whats.gif')}}" width="30" class="d-md-none" style="margin-left:10px; margin-top:-10px;" data-aos="fade-left">
                    </a>
                </div>
            </div>
            </div>
        @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>