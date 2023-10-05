@extends("admin.layout")

@section("head")
    <title>Admin</title>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | ADMINISTRAÇÃO</h2>
            <h3 class="text-info">Bem vindo a área administrativa do seu site!</h3><br>
            <h4 class="text-info">Aqui você <b><span class="text-success">INSERE</span>, <span class="text-warning">EDITA</span> E <span class="text-danger">EXCLUI</span></b> postagens no seu site.</h4><br>
            <h3 class="text-danger">Escolha no MENU onde deseja atualizar o site.</h3><br>
          <hr/>
        </div>
    </div>
@endsection