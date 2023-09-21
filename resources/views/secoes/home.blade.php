<section id="home" class="home">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <h2><small>{{$principal->titulo}}</small></h2>
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($principal->postagens as $postagem)
                            <div class="swiper-slide">
                            <img class="img-fluid" src="{{asset('uploads/postagem-'.$postagem->id.'.jpg')}}" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}">
                            <div class="portfolio-info pt-3 pb-4" style="color:{{$configuracao['cortxt']}}; position: relative;">
                                <h4>{{$postagem->titulo}}</h4>
                                <h6>{{$postagem->subtitulo}}</h6>
                                <div>{!!$postagem->descricao!!}</div>
                            </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-md-6">
                @if($principal->subtitulo != '')
                    <h3><strong>{{$principal->subtitulo}}</strong></h3>
                    <div>{!!$principal->descricao!!}</div>
                @endif
            </div>
        </div>
    </div>
</section>