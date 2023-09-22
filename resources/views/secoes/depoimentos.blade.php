<section id="depoimentos" class="depoimentos" style='background: url("uploads/secao-{{$depoimentos->id}}.jpg") center center no-repeat; background-size:cover;'>
    <div class="container position-relative">
        <div class="text-center title m-5 " style="color:{{$configuracao['cortxt4']}};">
            <h1 class="scrollto animate__animated animate__fadeInUp mb-4"><strong>{{$depoimentos->titulo}}</strong></h1>
            <h3 class="scrollto animate__animated animate__fadeInUp mb-4">{{$depoimentos->subtitulo}}</h3>
            <div class="scrollto animate__animated animate__fadeInUp mb-4">{!!$depoimentos->descricao!!}</div>
        </div>
        <div class="depoimentos-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($depoimentos->postagens as $postagem)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <a href="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$postagem->titulo}} - {{$postagem->subtitulo}}">
                                <img src="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg')}}" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}" class="testimonial-img"></a>
                            <h3>{{$postagem->titulo}}</h3>
                            <h4>{{$postagem->subtitulo}}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {!!$postagem->descricao!!}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>