@extends("layout")
@section("head")
    <title>F.A.Q - {{$configuracao['subtitulo']}}</title>
@endsection
@section("content")
    <main id="main" class="mt-5">
        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
    
            <div class="section-title">
            <span>{{$faq->titulo}}</span>
            <h2>{{$faq->titulo}}</h2>
            <h4>{{$faq->subtitulo}}</h4>
            <div>{!!$faq->descricao!!}</div>
            </div>
    
            <div class="row">         
            <div class="col-12">
                <!-- F.A.Q List 1-->
                <div class="accordion accordion-flush" id="faqlist1">
  

            @foreach($faq->postagens as $postagem)

                
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$postagem->titulo}}">
                        <strong><i class="bx bx-help-circle icon-help"></i> 
                        {{$postagem->titulo}}</strong>
                                        </button>
                                        </h2>
                                        <div id="{{$postagem->titulo}}" class="accordion-collapse " data-bs-parent="#{{$postagem->titulo}}">
                                        <div class="accordion-body">
                                            <h4>{{$postagem->subtitulo}}</h4>
                                            <div>{!!$postagem->descricao!!}</div>
                                        </div>
                                        </div>
                                    </div>
                        @endforeach


                </div>
            </div>
            
            </div>
        </div>
        </section>
    </main>
@endsection
