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
          <span><?php echo $categoria->titulo ?></span>
          <h2><?php echo $categoria->titulo ?></h2>
          <h4><?php echo $categoria->subtitulo ?></h4>
          <div><?php echo $categoria->descricao ?></div>
        </div>

        <div class="row portfolio-container justify-content-center">
          @foreach ($categoria->subcategorias as $subcategoria)
            <div class="col-lg-4 portfolio-item <?php echo $subcategoria->titulo ?>">
              <a href="{{asset('imagens/subcategorias/grande/'.$subcategoria->id.'.1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $subcategoria->titulo ?> - <?php echo $subcategoria->subtitulo ?>">
                <div class="portfolio-wrap">
                  <img src="{{asset('imagens/subcategorias/'.$subcategoria->id.'.1.jpg')}}" class="img-fluid" width="100%" style="object-fit:cover; height:250px;">
                  <div class="portfolio-info p-3" style="color:<?php echo $configuracao->cortxt4 ?>;">
                    <h4><?php echo $subcategoria->titulo ?></h4>
                    <h6><?php echo $subcategoria->subtitulo ?></h6>
                    <div><?php echo $subcategoria->descricao ?></div>
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