@extends("layout")
@section("head")
  <title>Termos de Uso - {{$configuracao['titulo']}}</title>
@endsection
@section("content")
  <main id="main" class="mt-5">
    <!-- ======= termos Section ======= -->
    <section id="privacidade" class="privacidade">
      <div class="container">
        <div class="section-title">
          <span>TERMOS</span>
          <h2>TERMOS</h2>
        </div>
        <div class="row">
          <div class="col-12">
            {!!$configuracao['termos']!!}
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection