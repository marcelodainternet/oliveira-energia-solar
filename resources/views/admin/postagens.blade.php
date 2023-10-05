@extends("admin.layout")
@section("head")
  <title>Postagens - Admin</title>
  <script src="{{asset('assets/libs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/richtext-editor.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/upload-image.js')}}"></script>
@endsection
@section("content")
  <div class="row">
      <div class="col-md-12">
        <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | POSTAGENS</h2>
        <h4 class="panel-default text-info">Insira, edite ou exclua POSTAGENS no site! </h4>
      </div>
  </div>
  <br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-5">
            <h3 style="margin-bottom:10px; margin-top:0px;">{{$postagem?"Editar Postagem":"Cadastrar Postagem"}}</h3>
          <form action="{{$postagem?route('postagens.atualizar', ['secao' => $secao->id, 'postagem' => $postagem->id]):route('postagens.inserir', ['secao' => $secao->id])}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
            @csrf
            @if($postagem)
              @method('put')
            @endif
            <fieldset>
              <div class="row">

                <input type="hidden" name="secao" value="{{!$secao?:$secao->id}}"/>

                <div class="form-group col-md-6">
                  <label>Imagem</label><br>
                  @if($postagem)
                    <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" path="uploads/postagem-{{$postagem->id}}.jpg" name="imagem"/>
                  @else
                    <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" name="imagem"/>
                  @endif
                </div>

                <!-- Text input Inativo 
                <div style="text-align:left;" class="form-group col-md-12">
                  <label class="control-label" for="inativo">Inativo:</label>
                  <label class="checkbox-inline" for="inativo-0">
                    <input type="checkbox" id="inativo-0"  name="inativo" value="1" {{$postagem && $postagem->inativo?"checked=checked":""}}>SIM
                  </label>
                </div>  -->

            <!-- Select Secao 
            <div class="form-group col-md-12">
              <label>Escolha a SEÇÃO da postagem*</label>

              <select required name="secao" id="secao" class="form-control">
                <option>
                <option value="" selected="selected"></option>
              </select> -->

                <!-- Text input Postagem  -->
                <div class="form-group col-md-12">
              <div class="alert-danger">Só deve existir UMA postagem em VITRINES 2 e 3.</div>
              <div class="alert-success" style="margin-bottom: 10px;">Para as demais seções as postagens são ILIMITADAS</div>
                  <label>Postagem*</label>
                  <input required type="text" id="nome" name="nome" placeholder="Nome*" class="form-control" value="{{$postagem->nome??''}}">
                </div>
  
                <!-- Text input Titulo-->
                <div class="form-group col-md-12">
                  <label>Titulo</label>
                  <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="{{$postagem->titulo??''}}">
                </div>
  
                <!-- Text input SubTitulo-->
                <div class="form-group col-md-12">
                  <label>Subtitulo</label>
                  <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="{{$postagem->subtitulo??''}}">
                </div>
  
                <!-- Text input Descrição-->
                <div class="form-group col-md-12">
                  <label>Descrição</label>
                  <textarea id="descricao" name="descricao" rows="3" class="form-control">{{$postagem->descricao??''}}</textarea>
                </div>
  
                <!-- Text input Link-->
                <div class="form-group col-md-12">
                  <label>Link</label>
                  <input type="text" id="link" name="link" placeholder="Link" class="form-control" value="{{$postagem->link??''}}">
                </div>

                <!-- File Button Enviar -->
                <div class="form-group col-md-12">
                  <button type="submit" class="btn btn-primary btn-block">{{$postagem?"SALVAR":"CADASTRAR"}}</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
  
        <div class="col-md-7">
          <div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
            <h3 style="margin:0;">Postagens da {{$secao->nome}} ({{$secao->postagens->count()}})</h3>
            @if($postagem)
              <a class="btn btn-sm btn-primary" href="{{route('postagens', ['secao' => $secao])}}">Adicionar</a>
            @endif
          </div>

          @if(session()->get("excluida"))
            <div class="alert alert-success" role="alert">Postagem excluída com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif
          
          @if($secao->postagens->isNotEmpty())
            <table class="table table-responsive table-hover table-striped table-responsive">
              <tr style="text-align:center;">
                <td>
                  <a href=""><b>ID</b></a>
                </td>
                <td>
                  <a href=""><b>Ativo</b></a>
                </td>
                <td>
                  <a href=""><b>Imagem</b></a>
                </td>
                <td style="text-align:left;">
                  <a href=""><b>Postagem</b></a>
                </td>
                <td style="text-align:left;">
                  <a href=""><b>Título</b></a>
                </td>
                <td style="text-align:left;">
                  <a href=""><b>Editar/Excluir</b></a>
                </td>
              </tr>
              @foreach($secao->postagens as $postagem)
                <tr>
                  <td style="text-align:center; vertical-align:middle; width:0; white-space:nowrap;">{{$postagem->id}}</td>
                  <td style="text-align:center; vertical-align:middle; width:0; white-space:nowrap;">
                    @if ($postagem->inativo == 1)
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#a94442" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @else
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#3c763d" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @endif
                  </td>
                  <td style="text-align:center; vertical-align:middle; width:0; white-space:nowrap;">
                    @if (file_exists(public_path('uploads/postagem-'.$postagem->id.'-thumbs.jpg')))
                      <img width="100" class="img-thumbnail" src="{{asset('uploads/postagem-'.$postagem->id.'-thumbs.jpg').'?'.time()}}">
                    @endif
                  </td>
                  <td style="text-align:left; vertical-align:middle;">
                    <?php echo $postagem->nome ?>
                  </td>
                  <td style="text-align:left; vertical-align:middle;">
                    @if($postagem->titulo)
                      {{$postagem->titulo}}
                    @else
                      <i class="text-muted">Sem título</i>
                    @endif
                  </td>
                  <td style="width:0; white-space:nowrap; vertical-align:middle;">
                    <a class="btn btn-sm btn-primary" href="{{route('postagens', ['secao' => $secao->id, 'postagem' => $postagem->id])}}" onClick="return confirmLink(this, 'excluir este item?')">
                      Editar
                    </a>

                    <button data-toggle="modal" data-target="#excluir-postagem-{{$postagem->id}}" class="btn btn-sm btn-danger with-tip delete" title="remover postagem" id="{{$postagem->id}}">
                      Excluir
                    </button>
                    <div class="modal fade" id="excluir-postagem-{{$postagem->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="meuModalLabel">Excluir Postagem</h4>
                            </div>
                            <div class="modal-body">
                                <p>Deseja realmente excluir esta postagem?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <form method="post" action="{{route('postagens.excluir', ['secao' => $secao->id, 'postagem' => $postagem->id])}}" style="display:inline-block;">
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
              Nenhuma postagem encontrada
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection