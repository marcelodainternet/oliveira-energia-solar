<section id="vitrines2" class="vitrines2e3" style='background: url("imagens/secoes/grande/<?php echo $vitrine2->id ?>.1.jpg") center center no-repeat; background-size:cover; margin-bottom:75px;'>
    <div class="container position-relative">
        <div class="text-center title m-5 " style="color:{{$configuracao['cortxt4']}};">
            <h1 class="scrollto animate__animated animate__fadeInUp mb-4"><strong><?php echo $vitrine2->titulo ?></strong></h1>
            @if ($vitrine2->subtitulo != '')
                <h3 class="ascrollto animate__animated animate__fadeInUp mb-4" style="color:<?php echo $configuracao['cortxt4'] ?>;"><?php echo $vitrine2->subtitulo ?></h3>
            @endif
            @if ($vitrine2->descricao != '')
                <div class="scrollto animate__animated animate__fadeInUp"><?php echo $vitrine2->descricao ?></div>
            @endif
            <a target="_blank" href="https://api.whatsapp.com/send?phone=55<?php echo $configuracao['telefone']; ?>&text=<?php echo $configuracao['whatstxt2']; ?>" class="mt-3 btn btn-info btn-get-started scrollto animate__animated animate__fadeInUp" style="color:<?php echo $configuracao['cortxt4'] ?>;">Saber mais...<img src="imagens/icon-whats2.gif" width="30" class="d-md-none" style="margin-left:10px; margin-top:-10px;" data-aos="fade-left"></a>
        </div>
    </div>
</section>