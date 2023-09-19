@extends("admin.layout")

@section("head")
    <title>Admin</title>
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | ADMINISTRAÇÃO</h2>
            <h3 class="panel-default text-info">Bem vindo a área administrativa do site!</h3>
            <hr/>
        </div>
    </div>
@endsection