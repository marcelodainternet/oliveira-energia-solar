@extends("layout")
@section("head")
  <title>Política de Privacidade - {{$configuracao['titulo']}}</title>
@endsection
@section("content")
  <main id="main" class="mt-5">
    <!-- ======= termos Section ======= -->
    <section id="privacidade" class="privacidade">
      <div class="container">
        <div class="section-title">
          <span>PRIVACIDADE</span>
          <h2>PRIVACIDADE</h2>
        </div>
        <div class="row">
          <div class="col-12">
            {{$configuracao['privacidade']}}
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection