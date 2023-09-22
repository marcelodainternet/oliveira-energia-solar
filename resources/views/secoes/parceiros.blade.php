<section id="parceiros" class="parceiros" style="margin-top:-25px">
    <div class="container">
        <div class="section-title">
            <span>{{$parceiros->titulo}}</span>
            <h2>{{$parceiros->titulo}}</h2>
            <h4>{{$parceiros->subtitulo}}</h4>
            <div>{!!$parceiros->descricao!!}</div>
        </div>
        <div id="parceiros" class="parceiros row">
            <div class="container" data-aos="zoom-in">
                <div class="parceiros-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($parceiros->postagens as $postagem)
                            <div class="swiper-slide">
                                <a target="_blanc" href="{{$postagem->link}}">
                                    <img src="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg')}}" class="img-fluid" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
