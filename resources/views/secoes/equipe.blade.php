<section id="equipe" class="equipe" style="margin-top:-110px; padding-bottom:100px;">
    <div class="container">
        <div class="section-title">
            <span>{{$equipe->titulo}}</span>
            <h2>{{$equipe->titulo}}</h2>
            <h4>{{$equipe->subtitulo}}</h4>
            <div>{!!$equipe->descricao!!}</div>
        </div>
        <div class="row">
            @foreach ($equipe->postagens as $postagem)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                    <div class="pic">
                        <a href="uploads/postagem-{{$postagem->id}}-thumbs.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$postagem->titulo}} - {{$postagem->subtitulo}}"><img src="uploads/postagem-{{$postagem->id}}-thumbs.jpg" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}" class="img-fluid"></a>
                    </div>
                    <div class="member-info" style="margin-left:10px;">
                        <h4>{{$postagem->titulo}}</h4>
                        <span>{{$postagem->subtitulo}}</span>
                        <div>{!!$postagem->descricao!!}</div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>