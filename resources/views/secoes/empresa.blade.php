<section id="empresa" class="home">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <h2><small><?php echo $empresa->titulo ?></small></h2>
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($empresa->postagens as $postagem)
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('uploads/postagem-'.$postagem->id.'.jpg')}}" alt="<?php echo $postagem->titulo ?>" title="<?php echo $postagem->titulo ?>">
                                <div class="portfolio-info pt-3 pb-4" style="color:<?php echo $configuracao['cortxt'] ?>; position: relative;">
                                    <h4><?php echo $postagem->titulo ?></h4>
                                    <h6><?php echo $postagem->subtitulo ?></h6>
                                    <div><?php echo $postagem->descricao ?></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                @if ($empresa->subtitulo != '')
                    <h3><strong><?php echo $empresa->subtitulo ?></strong></h3>
                    <div><?php echo $empresa->descricao ?></div>
                @endif
            </div>
        </div>
    </div>
</section>