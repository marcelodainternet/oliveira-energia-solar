<section id="depoimentos" class="depoimentos" style='background: url("uploads/secao-<?php echo $depoimentos->id ?>.jpg") center center no-repeat; background-size:cover;'>
    <div class="container position-relative">
        <div class="text-center title m-5 " style="color:<?php echo $configuracao['cortxt4'] ?>;">
            <h1 class="scrollto animate__animated animate__fadeInUp mb-4"><strong><?php echo $depoimentos->titulo ?></strong></h1>
            <h3 class="scrollto animate__animated animate__fadeInUp mb-4"><?php echo $depoimentos->subtitulo ?></h3>
            <div class="scrollto animate__animated animate__fadeInUp mb-4"><?php echo $depoimentos->descricao ?></div>
        </div>
        <div class="depoimentos-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($depoimentos->postagens as $postagem)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <a href="imagens/postagens/thumbs/<?php echo $postagem->id ?>.1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $postagem->titulo ?> - <?php echo $postagem->subtitulo ?>"><img src="imagens/postagens/thumbs/<?php echo $postagem->id ?>.1.jpg" alt="<?php echo $postagem->titulo ?>" title="<?php echo $postagem->titulo ?>" class="testimonial-img"></a>
                            <h3><?php echo $postagem->titulo ?></h3>
                            <h4><?php echo $postagem->subtitulo ?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?php echo $postagem->descricao ?>
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