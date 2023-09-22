<section id="destaque" class="home" style="margin-top:-50px; margin-bottom:-50px">
    <div class="container">
        <div class="row content">
        <div class="col-lg-6">
            <h2><small>{{$destaque->titulo}}</small></h2>
            <h3>{{$destaque->subtitulo}}</h3>
            <div class="mt-3 mb-3">{!!$destaque->descricao!!}</div>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{$configuracao['telefone'];}}&text={{$configuracao['whatstxt'];}}" class="mt-3 mb-4 btn btn-info btn-get-started scrollto animate__animated animate__fadeInUp" style="color:{{$configuracao['cortxt4'];}};">Saber mais...<img src="assets/img/icon-whats.gif" width="30" class="d-md-none" style="margin-left:10px; margin-top:-10px;" data-aos="fade-left"></a>
        </div>
        <div class="col-lg-6 order-lg-2 videos">
            @foreach ($destaque->postagens as $postagem) 
                <a href="{{$postagem->link}}" class="glightbox play-btn mb-4" style="color:{{$configuracao['cortxt']}}">
                    <div class="post-box">
                        <div class="post-img">
                            <img src="{{asset('uploads/postagem-'.$postagem->id.'.jpg')}}" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}" class="img-thumbnail" width="100%">
                        </div>
                        <h5>{{$postagem->titulo}}</h5>
                        <h6>{{$postagem->subtitulo}}</h6>
                        <div><small>{!!$postagem->descricao!!}</small></div>
                    </div>
                </a>
            @endforeach
        </div>
        </div>
    </div>
</section>