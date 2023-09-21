@extends("layout")
@section("head")
    <title>Dicas - {{$configuracao['subtitulo']}}</title>
@endsection
@section("content")
    <main id="main" class="mt-5">
        <!-- ======= DICAS Section ======= -->
        <section id="dicas" class="faq">
        <div class="container" data-aos="fade-up">
            
            <div class="section-title">
                <span>{{$dicas->titulo}}</span>
                <h2>{{$dicas->titulo}}</h2>
                <h4>{{$dicas->subtitulo}}</h4>
                <div>{!!$dicas->descricao!!}</div>
            </div>

            <div class="row">

            <div class="col-md-12">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="{{$dicas->id}}">
                @foreach ($dicas->postagens as $postagem)
                    <div class="accordion-item">

                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$postagem->id}}{{$postagem->titulo}}">
                        <strong><i class="bx bx-help-circle icon-help"></i>
                            {{$postagem->titulo}}</strong>
                        </button>
                    </h2>

                    <div id="{{$postagem->id}}{{$postagem->titulo}}" class="accordion-collapse" data-bs-parent="#{{$postagem->id}}">
                        <div class="accordion-body row">

                        <div class="col-md-3">
                            <a href="{{asset('uploads/postagem-'.$postagem->id.'-grande.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$postagem->titulo}} - {{$postagem->subtitulo}}">
                            <img class="img-responsive img-thumbnail" src="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg')}}" alt="{{$postagem->titulo}}" title="{{$postagem->titulo}}">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h4>{{$postagem->subtitulo}}</h4>
                            <div>{!!$postagem->descricao!!}</div>
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