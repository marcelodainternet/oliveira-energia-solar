@extends("admin.layout")
@section("head")
  <title>Fotos - Admin</title>
  <script src="{{asset('assets/libs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/richtext-editor.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/upload-image.js')}}"></script>
@endsection
@section("content")
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-head-line"><a href="./"><i class="ace-icon fa fa-home home-icon"></i></a> | Fotos</h2>
      <h4 class="panel-default text-info">Insira, edite ou exclua Fotos nos Projetos</h4>
    </div>
  </div>
  <br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-5">
          <div style="margin-bottom:20px;">
            <h3 style="margin:0;">{{$foto?"Editar Foto":"Cadastrar Foto"}} no projeto {{strtok($projeto->nome, ' ')}}</h3>
          </div>
          <form action="{{$foto?route('fotos.atualizar', ['projeto' => $projeto->id, 'foto' => $foto->id]):''}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
            @csrf
            @if($foto)
              @method('put')
            @endif
            <fieldset>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Imagem</label><br>
                  @if($foto)
                    <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" path="uploads/projeto-foto-{{$foto->id}}.jpg" name="imagem"/>
                  @else
                    <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" name="imagem"/>
                  @endif
                </div>

                <!-- Text input Nome  -->
                <div class="form-group col-md-12">
                  <label>Postagem*</label>
                  <input required type="text" id="nome" name="nome" placeholder="Nome* (Obrigatório, só aparece para o google)" class="form-control" value="<?php echo $foto->nome ?? ''; ?>">
                </div>

                <!-- Text input Titulo-->
                <div class="form-group col-md-12">
                  <label>Titulo</label>
                  <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="<?php echo $foto->titulo??'' ?>">
                </div>

                <!-- Text input SubTitulo-->
                <div class="form-group col-md-12">
                  <label>Subtitulo</label>
                  <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="<?php echo $foto->subtitulo??'' ?>">
                </div>

                <!-- Text input Descrição-->
                <div class="form-group col-md-12">
                  <label>Descrição</label>
                  <textarea id="descricao" name="descricao" rows="3" class="form-control"><?php echo $foto->descricao??''; ?></textarea>
                </div>

                <!-- File Button Enviar -->
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-block">{{$foto?"Salvar":"Adicionar"}}</button>
                </div>
            </fieldset>
          </form>
        </div>

        <div class="col-md-7">
          <div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
            <h3 style="margin:0;">Fotos cadastradas</h3>
            @if($foto)
                <a class="btn btn-sm btn-primary" href="{{route('fotos', ['projeto' => $projeto->id])}}">Adicionar</a>
            @endif
          </div>

          @if(session()->get("excluida"))
            <div class="alert alert-success" role="alert">Foto excluída com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif

          @if($projeto->subcategorias->isNotEmpty())
            <table class="table table-hover table-striped table-responsive">
              <tr style="text-align:center;">
                <td><strong><a>ID</a></strong></td>
                <td><strong><a>Ativo</a></strong></td>
                <td><strong><a>Imagem</a></strong></td>
                <td><strong><a>Projeto</a></strong></td>
                <td style="text-align:left;"><strong><a>Postagem</a></strong></td>
                <td></td>
              </tr>
              @foreach($projeto->subcategorias as $foto)
                <tr style="text-align:center;">
                  <td style="width:0; white-space:nowrap;">{{$foto->id}}</td>

                  <td style="width:0; white-space:nowrap;">
                    @if ($foto->inativo == 1)
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#a94442" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @else
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#3c763d" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @endif
                  </td>

                  <td style="width:0; white-space:nowrap;">
                    @if (file_exists(public_path('uploads/projeto-foto-'.$foto->id.'-thumbs.jpg')))
                      <img width="100" class="img-thumbnail" src="{{asset('uploads/projeto-foto-'.$foto->id.'-thumbs.jpg').'?'.time()}}">
                    @endif
                  </td>

                  <td></td>
                  <td></td>

                  <td style="width:0; white-space:nowrap;">                    
                    <a class="btn btn-sm btn-primary" href="{{route('fotos', ['projeto' => $projeto->id, 'foto' => $foto->id])}}" onClick="return confirmLink(this, 'excluir este item?')">
                      Editar
                    </a>

                    <button data-toggle="modal" data-target="#excluir-foto-{{$foto->id}}" class="btn btn-sm btn-danger with-tip delete" title="remover foto" id="{{$foto->id}}">
                      Excluir
                    </button>
                    <div class="modal fade" id="excluir-foto-{{$foto->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="meuModalLabel">Excluir Foto</h4>
                            </div>
                            <div class="modal-body">
                              <p>Deseja realmente excluir esta foto?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <form method="post" action="{{route('fotos.excluir', ['projeto' => $projeto->id, 'foto' => $foto->id])}}" style="display:inline-block;">
                                  @csrf
                                  @method("delete")
                                  <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
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
              Nenhuma foto encontrada
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection