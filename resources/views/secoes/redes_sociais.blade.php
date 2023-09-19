<section id="team" class="team" style="margin-top:-40px;">
    <div class="container">
        <div class="section-title">
            <span><?php echo $redes_sociais->titulo ?></span>
            <h2><?php echo $redes_sociais->titulo ?></h2>
            <h4><?php echo $redes_sociais->subtitulo ?></h4>
            <div><?php echo $redes_sociais->descricao ?></div>
        </div>
        <div class="row justify-content-center">
            @if ($configuracao['instagram'] != '')
                <div align="center" class="col-md-6 mb-5">
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                    <div class="elfsight-app-b4486950-cc3a-423a-a7b8-5e153ba69e59"></div>
                </div>
            @endif

            @if ($configuracao['facebook'] != '')
                <div align="center" class="col-md-6">
                    <h3><strong>Facebook</strong></h3>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v12.0" nonce="XOLK1blf"></script>
                    <div class="fb-page" data-href="<?php echo $configuracao['facebook'] ?>" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="<?php echo $configuracao['facebook'] ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $configuracao['facebook'] ?>"><?php echo $redes_sociais->titulo ?></a></blockquote>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>