@extends("layout")
@section("head")
    <title>Dicas - <?php echo $configuracao['subtitulo'] ?></title>
@endsection
@section("content")
    <main id="main" class="mt-5">
        <!-- ======= DICAS Section ======= -->
        <section id="dicas" class="faq">
        <div class="container" data-aos="fade-up">
            
            <div class="section-title">
                <span><?php echo $dicas->titulo ?></span>
                <h2><?php echo $dicas->titulo ?></h2>
                <h4><?php echo $dicas->subtitulo ?></h4>
                <div><?php echo $dicas->descricao ?></div>
            </div>

            <div class="row">

            <div class="col-md-12">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="<?php echo $dicas->id ?>">
                @foreach ($dicas->postagens as $postagem)
                    <div class="accordion-item">

                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $postagem->id ?><?php echo $postagem->titulo ?>">
                        <strong><i class="bx bx-help-circle icon-help"></i>
                            <?php echo $postagem->titulo ?></strong>
                        </button>
                    </h2>

                    <div id="<?php echo $postagem->id ?><?php echo $postagem->titulo ?>" class="accordion-collapse" data-bs-parent="#<?php echo $postagem->id ?>">
                        <div class="accordion-body row">

                        <div class="col-md-3">
                            <a href="imagens/postagens/grande/<?php echo $postagem->id ?>.1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $postagem->titulo ?> - <?php echo $postagem->subtitulo ?>">
                            <img class="img-responsive img-thumbnail" src="imagens/postagens/thumbs/<?php echo $postagem->id ?>.1.jpg" alt="<?php echo $postagem->titulo ?>" title="<?php echo $postagem->titulo ?>">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h4><?php echo $postagem->subtitulo ?></h4>
                            <div><?php echo $postagem->descricao ?></div>
                        </div>

                        </div>
                    </div>

                    </div>
                @endforeach
                </div>
            </div>

            </div>
        </div>
        </section><!-- End Breadcrumbs -->
    </main>
@endsection