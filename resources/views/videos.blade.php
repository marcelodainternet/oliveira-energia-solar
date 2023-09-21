@extends("layout")
@section("head")
    <title>Vídeos - {{$configuracao['titulo']}}</title>
@endsection
@section("content")
    <main id="main" class="mt-5">
        <!-- ======= VIDEOS Section ======= -->
        <section id="videos" class="videos">
        <div class="container">
            <div class="section-title mb-4">
                <span>{{$videos->titulo}}</span>
                <h2>{{$videos->titulo}}</h2>
                <h4>{{$videos->subtitulo}}</h4>
                <div>{{$videos->descricao}}</div>
            </div>
            
            <div class="row justify-content-center">

            @foreach ($videos->postagens as $postagem)
                <!-- ======= Hero Section ======= -->
                <div class="col-md-3 col-6">
                <div class="post-box">
                    <div align="center" class="post-img">
                    <a href="{{$postagem['link']}}" class="glightbox play-btn pt-2" style="color:{{$configuracao['cortxt']}};">
                        <h6><strong>{{$postagem['titulo']}}</strong></h6>
                        <img src="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg')}}" alt="{{$postagem['titulo']}}" title="{{$postagem['titulo']}}" class="img-thumbnail mb-2" width="100%">
                        <h6>{{$postagem['subtitulo']}}</h6>
                        <div><small>{{$postagem['descricao']}}</small></div>
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