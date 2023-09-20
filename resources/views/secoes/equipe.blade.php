<section id="equipe" class="equipe" style="margin-top:-110px;">
    <div class="container">
        <div class="section-title">
            <span><?php echo $equipe->titulo ?></span>
            <h2><?php echo $equipe->titulo ?></h2>
            <h4><?php echo $equipe->subtitulo ?></h4>
            <div><?php echo $equipe->descricao ?></div>
        </div>
        <div class="row">
            @foreach ($equipe->postagens as $postagem)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                    <div class="pic">
                        <a href="uploads/postagem-<?php echo $postagem->id ?>-thumbs.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $postagem->titulo ?> - <?php echo $postagem->subtitulo ?>"><img src="uploads/postagem-<?php echo $postagem->id ?>-thumbs.jpg" alt="<?php echo $postagem->titulo ?>" title="<?php echo $postagem->titulo ?>" class="img-fluid"></a>
                    </div>
                    <div class="member-info" style="margin-left:10px;">
                        <h4><?php echo $postagem->titulo ?></h4>
                        <span><?php echo $postagem->subtitulo ?></span>
                        <div><?php echo $postagem->descricao ?></div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>