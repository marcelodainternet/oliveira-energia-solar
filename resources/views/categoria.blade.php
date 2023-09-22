@extends("layout")
@section("head")
  <title>{{$categoria->titulo}} - {{$categoria->subtitulo}}</title>
@endsection
@section("content")
  <main id="main" class="mt-5">
    <!-- ======= termos Section ======= -->
    <section id="categoria" class="portfolio">
      <div class="container">

        <div class="section-title mb-2">
          <span>{{$categoria->titulo}}</span>
          <h2>{{$categoria->titulo}}</h2>
          <h4>{{$categoria->subtitulo}}</h4>
          <div>{!!$categoria->descricao!!}</div>
        </div>

        <div class="row portfolio-container justify-content-center">
          @foreach ($categoria->subcategorias as $subcategoria)
            <div class="col-lg-4 portfolio-item {{$subcategoria->titulo}}">
              <a href="{{asset('uploads/projeto-foto-'.$subcategoria->id.'-grande.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$subcategoria->titulo}} - {{$subcategoria->subtitulo}}">
                <div class="portfolio-wrap">
                  <img src="{{asset('uploads/projeto-foto-'.$subcategoria->id.'.jpg')}}" class="img-fluid" width="100%" style="object-fit:cover; height:250px;">
                  <div class="portfolio-info p-3" style="color:{{$configuracao->cortxt4}};">
                    <h4>{{$subcategoria->titulo}}</h4>
                    <h6>{{$subcategoria->subtitulo}}</h6>
                    <div>{!!$subcategoria->descricao!!}</div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>

      </div>
    </section>
  </main>
@endsection