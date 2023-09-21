<section id="portfolio" class="portfolio" style="margin-top:-75px;">
    <div class="container">
        <div class="section-title">
            <span><?php echo $portfolio->titulo ?></span>
            <h2><?php echo $portfolio->titulo ?></h2>
            <h4><?php echo $portfolio->subtitulo ?></h4>
            <div><?php echo $portfolio->descricao ?></div>
        </div>
        <div class="row portfolio-container">
            @foreach ($categorias as $categoria)
                <div class="col-lg-4 portfolio-item <?php echo $categoria->titulo ?>">
                    <div class="portfolio-wrap">
                    <img src="{{asset('uploads/projeto-'.$categoria->id.'.jpg')}}" class="img-fluid" width="100%">
                    <div class="portfolio-info p-3" style="color:<?php echo $configuracao['cortxt4'] ?>;">
                        <h4><?php echo $categoria->titulo ?></h4>
                        <h6><?php echo $categoria->subtitulo ?></h6>
                        <div><?php echo $categoria->descricao ?></div>
                        <div class="portfolio-links mt-3">
                            <a href="{{asset('uploads/projeto-'.$categoria->id.'-grande.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $categoria->titulo ?> - <?php echo $categoria->subtitulo ?>"><i class="ri-add-fill"></i></a>
                            <a href="{{url('categorias/'.$categoria->id)}}" title="<?php echo $categoria->titulo ?>"><i class="ri-links-fill"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>