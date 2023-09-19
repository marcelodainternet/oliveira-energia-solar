@extends("layout")
@section("head")
    <title>Vídeos - <?php echo $configuracao['titulo'] ?></title>
@endsection
@section("content")
    <main id="main" class="mt-5">
        <!-- ======= VIDEOS Section ======= -->
        <section id="videos" class="videos">
        <div class="container">
            <div class="section-title mb-4">
                <span><?php echo $videos->titulo ?></span>
                <h2><?php echo $videos->titulo ?></h2>
                <h4><?php echo $videos->subtitulo ?></h4>
                <div><?php echo $videos->descricao ?></div>
            </div>
            
            <div class="row justify-content-center">

            @foreach ($videos->postagens as $postagem)
                <!-- ======= Hero Section ======= -->
                <div class="col-md-3 col-6">
                <div class="post-box">
                    <div align="center" class="post-img">
                    <a href="<?php echo $postagem['link'] ?>" class="glightbox play-btn pt-2" style="color:<?php echo $configuracao['cortxt'] ?>;">
                        <h6><strong><?php echo $postagem['titulo'] ?></strong></h6>
                        <img src="imagens/postagens/thumbs/<?php echo $postagem['id'] ?>.1.jpg" alt="<?php echo $postagem['titulo'] ?>" title="<?php echo $postagem['titulo'] ?>" class="img-thumbnail mb-2" width="100%">
                        <h6><?php echo $postagem['subtitulo'] ?></h6>
                        <div><small><?php echo $postagem['descricao'] ?></small></div>
                    </a>
                    </div>
                </div>
                </div>
            @endforeach
            </div>
        </div>
        </section>
    </main>
@endsection