<section id="destaque" class="home" style="margin-top:-50px; margin-bottom:-50px">
    <div class="container">
        <div class="row content">
        <div class="col-lg-6">
            <h2><small><?php echo $destaque->titulo ?></small></h2>
            <h3><?php echo $destaque->subtitulo ?></h3>
            <div class="mt-3 mb-3"><?php echo $destaque->descricao ?></div>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo $configuracao['telefone']; ?>&text=<?php echo $configuracao['whatstxt']; ?>" class="mt-3 mb-4 btn btn-info btn-get-started scrollto animate__animated animate__fadeInUp" style="color:<?php echo $configuracao['cortxt4']; ?>;">Saber mais...<img src="assets/img/icon-whats.gif" width="30" class="d-md-none" style="margin-left:10px; margin-top:-10px;" data-aos="fade-left"></a>
        </div>
        <div class="col-lg-6 order-lg-2 videos">
            @foreach ($destaque->postagens as $postagem) 
                <a href="<?php echo $postagem->link ?>" class="glightbox play-btn mb-4" style="color:<?php echo $configuracao['cortxt'] ?>">
                    <div class="post-box">
                        <div class="post-img">
                            <img src="imagens/postagens/<?php echo $postagem->id ?>.1.jpg" alt="<?php echo $postagem->titulo ?>" title="<?php echo $postagem->titulo ?>" class="img-thumbnail" width="100%">
                        </div>
                        <h5><?php echo $postagem->titulo ?></h5>
                        <h6><?php echo $postagem->subtitulo ?></h6>
                        <div><small><?php echo $postagem->descricao ?></small></div>
                    </div>
                </a>
            @endforeach
        </div>
        </div>
    </div>
</section>