@extends("admin.layout")
@section("head")
  <title>E-mails Lead's - Admin</title>
@endsection
@section("content")
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | E-mails LEAD'S</h2>
      <h4 class="panel-default text-info">Cadastre ou Edite E-mails CAPTADOS!</h4>
    </div>
  </div>
  <br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row"> 
        <div class="col-md-5">
          <div style="margin-bottom:20px;">
            <h3>Cadastro e Edição de Lead's</h3>
          </div>
        
          @if(session()->get("saved"))
            <div class="alert alert-success" role="alert">Lead alterado com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif
          
          @if(session()->get("saved"))
            <div class="alert alert-success" role="alert">Lead cadastrado com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif
         
          <form method="post" action="{{$lead?route('leads.atualizar', ['lead' => $lead->id]):route('leads.inserir')}}">
            @csrf
            @if($lead)
              @method('put')
            @endif
            <div class="form-group">
              <label>Nome:</label>
              <input type="text" id="nome" name="nome" class="form-control" value="{{$lead->nome??''}}">
            </div>
            <div class="form-group">
              <label>Empresa:</label>
              <input type="text" id="empresa" name="empresa" class="form-control" value="{{$lead->empresa??''}}">
            </div>
            <div class="form-group">
              <label>Telefone:</label>
              <input type="text" id="telefone" name="telefone" class="form-control" value="{{$lead->telefone??''}}">
            </div>
            <div class="form-group">
              <label>E-mail:</label>
              <input type="text" id="email" name="email" class="form-control" value="{{$lead->email??''}}">
            </div>
            <div class="form-group">
              <label>Fonte:</label>
              <input type="text" id="fonte" name="fonte" class="form-control" value="{{$lead->fonte??''}}">
            </div>
            <div class="form-group">
              <label>Observações:</label>
              <input type="text" id="observacao" name="observacao" class="form-control" value="{{$lead->observacao??''}}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">{{$lead?"Salvar":"Adicionar"}}</button>
            </div>
          </form>
        </div>
        <div class="col-md-7">
          <div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
            <h3>Lead's Captados</h3>
            @if($lead)
              <a class="btn btn-sm btn-primary" href="{{route('leads')}}">Adicionar</a>
            @endif
          </div>

          @if(session()->get("excluido"))
            <div class="alert alert-success" role="alert">Lead excluído com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif

          @if($leads->isNotEmpty())
            <table class="table table-striped table-responsive">
              <tr style="text-align:center;">
                <td><strong>Nome</strong></td>
                <td><strong>Fone</strong></td>
                <td><strong>E-mail</strong></td>
                <td><strong></strong></td>
              </tr>
              @foreach($leads as $lead)
                <tr style="text-align:center;">
                  <td style="vertical-align:middle;">{!!$lead->nome != ""?$lead->nome:'<i class="text-muted">Sem nome</i>'!!}</td>
                  <td style="vertical-align:middle;">
                    @if($lead->telefone)
                      <a href="https://api.whatsapp.com/send?phone=55{{$lead->telefone}}&text=Olá {{$lead->nome}}," target="_blanc" class="imgwhats">
                        <img src="{{asset('assets/img/icon-whats.png')}}" width="20">
                      </a> {{$lead->telefone}}
                    @else
                      <i class="text-muted">Sem telefone</i>
                    @endif
                  </td>
                  <td style="vertical-align:middle;">{{$lead->email}}</td>
                  <td style="width:0; white-space:nowrap;">
                    <a class="btn btn-sm btn-primary" href="{{route('leads', ['lead' => $lead->id])}}">Editar</a>

                    <button data-toggle="modal" data-target="#excluir-lead-{{$lead->id}}" class="btn btn-sm btn-danger with-tip delete" title="remover lead" id="{{$lead->id}}">
                      Excluir
                    </button>
                    <div class="modal fade" id="excluir-lead-{{$lead->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="meuModalLabel">Excluir Lead</h4>
                            </div>
                            <div class="modal-body">
                              <p>Deseja realmente excluir este lead?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <form method="post" action="{{route('leads.excluir', ['lead' => $lead->id])}}" style="display:inline-block;">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-sm btn-danger">Excluir</a>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  
                  </td>
                </tr>
              @endforeach
            </table>
          @else
            <div class="alert alert-info">
              Nenhum lead encontrado
            </div>
          @endif

        </div>
      </div>

      <div class="row">
        <div class="col-md-12"> 
          <div class="titulo-pagina" style="text-align:center;">
            <h3>Lead's para Newsletter</h3>
          </div>
          <textarea class="form-control" name="textarea" id="textarea" rows="5">    
            @foreach($leads as $lead)
            "{{$lead->nome}}" <{{$lead->email}}>,
            @endforeach
          </textarea>
          <br>
          <br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12"> 
          <div class="titulo-pagina" align="center">
            <h3>Clientes para Newsletter</h3>
          </div>
          <textarea class="form-control" name="textarea" id="textarea"rows="5"></textarea>
          <br>
          <br>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="titulo-pagina" style="text-align:center;">
            <h3>Colaboradores para Newsletter</h3>
          </div>
          <textarea class="form-control" name="textarea" id="textarea"rows="5"></textarea>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
@endsection