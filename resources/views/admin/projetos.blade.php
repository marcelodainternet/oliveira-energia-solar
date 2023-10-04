@extends("admin.layout")
@section("head")
    <title>Projetos - Admin</title>
    <script src="{{asset('assets/libs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/richtext-editor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/upload-image.js')}}"></script>
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line"><a href="./"><i class="ace-icon fa fa-home home-icon"></i></a> | PROJETOS</h2>
            <h4 class="panel-default text-info">Insira, edite ou exclua PROJETOS no site! </h4>
        </div>
    </div>
    <br/>
    <div class="page-content">
        <div class="page-container">
            <div class="row">
                <div class="col-md-5">
                    <div style="margin-bottom:20px;">
                        <h3 style="margin:0;">{{$projeto?"Editar Projeto":"Cadastrar Projeto"}}</h3>
                    </div>
                    <form action="{{$projeto?route('projetos.atualizar', ['projeto' => $projeto->id]):''}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        @if($projeto)
                            @method('put')
                        @endif
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Imagem</label><br>
                                    @if($projeto)
                                        <x-upload-image fallback="{{asset('assets/img/padrao.png')}}" path="uploads/projeto-{{$projeto->id}}.jpg" name="imagem"/>
                                    @else
                                        <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" name="imagem"/>
                                    @endif
                                </div>

                                <!-- Text input Nome  -->
                                <div class="form-group col-md-12">
                                    <fieldset disabled>
                                        <label>Seção</label>
                                        <input type="text" id="" name="" placeholder="PORTFÓLIO" class="form-control">
                                    </fieldset>
                                </div>
                
                                <!-- Text input Nome  -->
                                <div class="form-group col-md-12">
                                    <label>Projeto*</label>
                                    <input required type="text" id="nome" name="nome" placeholder="Nome* (Obigatório, só aparece p/google)" class="form-control" value="<?php echo $projeto->nome??'' ?>">
                                </div>
                
                                <!-- Text input Titulo-->
                                <div class="form-group col-md-12">
                                    <label>Titulo</label>
                                    <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="<?php echo $projeto->titulo??'' ?>">
                                </div>
                
                                <!-- Text input SubTitulo-->
                                <div class="form-group col-md-12">
                                    <label>Subtitulo</label>
                                    <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="<?php echo $projeto->subtitulo??'' ?>">
                                </div>
                
                                <!-- Text input Descrição-->
                                <div class="form-group col-md-12">
                                    <label>Descrição</label>
                                    <textarea id="descricao" name="descricao" rows="10" class="form-control"><?php echo $projeto->descricao??'' ?></textarea>
                                </div>
                
                                <!-- File Button Enviar -->
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="filebutton"></label>
                                    <input type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" value="Cadastrar">
                                    <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php //echo $_GET['editar'] ?>">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
        
                <div class="col-md-7">
                    <div style="margin-bottom:20px; display:flex; justify-content:space-between; align-items:center;">
                        <h3 style="margin:0;">Projetos cadastrados ({{$projetos->count()}})</h3>
                        @if($projeto)
                            <a class="btn btn-sm btn-primary" href="{{route('projetos')}}">Adicionar</a>
                        @endif
                    </div>

                    @if(session()->get("excluido"))
                        <div class="alert alert-success" role="alert">Projeto excluído com sucesso!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif

                    @if($projetos->isNotEmpty())
                        <table class="table table-hover table-striped table-responsive">
                            <tr style="text-align:center;">
                                <td>
                                    <strong><a>Ativo</a></strong>
                                </td>
                                
                                <td><strong><a>Imagem</a></strong>
                                </td>
                                
                                <td style="text-align:left;"><strong><a>Projeto</a></strong></td>
                                <td style="text-align:left;"><strong><a>Título</a></strong></td>

                                <td></td>
                            </tr>
                            @foreach($projetos as $categoria)
                                <tr style="text-align:center;">
                                    <td style="width:0; white-space:nowrap; vertical-align:middle;">
                                        @if ($categoria->inativo == 1)
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
                                        @if(file_exists(public_path('uploads/projeto-'.$categoria->id.'-thumbs.jpg')))
                                            <img width="100" class="img-thumbnail" src="{{asset('uploads/projeto-'.$categoria->id.'-thumbs.jpg').'?'.rand(1,10)}}">
                                        @endif
                                    </td>

                                    <td style="text-align:left; vertical-align:middle;">{{$categoria->nome}}</td>
                                    <td style="text-align:left; vertical-align:middle;">{{$categoria->titulo}}</td>

                                    <td style="width:0; white-space:nowrap; vertical-align:middle;">
                                        <a class="btn btn-sm btn-primary" href="{{route('fotos', ['projeto' => $categoria->id])}}">
                                            Ver Fotos ({{$categoria->subcategorias->count()}})
                                        </a>
                                        <a class="btn btn-sm btn-primary" href="{{route('projetos', $categoria->id)}}">Editar</a>

                                        <button data-toggle="modal" data-target="#excluir-projeto-{{$categoria->id}}" class="btn btn-sm btn-danger with-tip delete" title="remover projeto" id="{{$categoria->id}}">
                                            Excluir
                                        </button>
                                        <div class="modal fade" id="excluir-projeto-{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="meuModalLabel">Excluir Postagem</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Deseja realmente excluir este projeto?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <form method="post" action="{{route('projetos.excluir', $categoria->id)}}" style="display:inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger">Excluir</button>
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
                            Nenhum projeto encontrado
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection