@extends("admin.layout")
@section("head")
    <title>Seções - Admin</title>
    <script src="{{asset('assets/libs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/richtext-editor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/upload-image.js')}}"></script>
@endsection
@section("content")
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | SEÇÕES</h2>
      <h4 class="panel-default text-info">Veja e Edite as SEÇÕES e POSTAGENS do site! </h4>
    </div>
  </div>
  <br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-5 {{$secao?'visible':'hidden'}}">
            <h3 style="margin-bottom:10px; margin-top:0px;">Editar Seção</h3>
            <p class="alert alert-success"><b>ATENÇÃO!</b> APENAS A SEÇÃO DEPOIMENTOS APRESENTA IMAGEM DA SEÇÃO NA HOMEPAGE.</p>
            <p class="alert alert-danger"><b>ATENÇÃO!</b> AS 3 SEÇÕES VITRINES NÃO EXIBEM "Título, subtitulo e descrição" NA HOMEPAGE.</p>
          <form action="{{$secao?route('secoes.atualizar', $secao->id):''}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
            @csrf
            @method('put')
            <div class="row">
                <div class="form-group col-md-12">
                <label>Imagem</label><br>
                @if($secao)
                  <x-upload-image fallback="{{asset('assets/img/padrao.png')}}" path="uploads/secao-{{$secao->id}}.jpg" name="imagem"/>
                @endif
              </div>
              <div class="form-group col-md-12 disabled">
                <fieldset disabled>
                  <label>Seção*</label>
                  <input required type="text" id="nome" name="nome" placeholder="Nome* (não aparece no site)" class=" form-control" value="<?php echo $secao->nome ?? ''; ?>">
                </fieldset>
              </div>
              <div class="form-group col-md-12">
                <label>Titulo</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="<?php echo $secao->titulo ?? ''; ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Subtitulo</label>
                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="<?php echo $secao->subtitulo ?? ''; ?>">
              </div>
              <div class="form-group col-md-12">
                <label>Descrição</label>
                <textarea id="descricao" name="descricao" rows="15" class="form-control"><?php echo $secao->descricao ?? ''; ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label" for="filebutton"></label>
                <input type="submit" id="enviar" name="enviar" class="btn btn-primary btn-block" value="SALVAR">
                <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php echo $_GET['editar'] ?? ''; ?>">
              </div>
            </div>
          </form>
        </div>
        <!-- /col-md-5 -->
  
        <div class="{{$secao?'col-md-7':'col-md-12'}}">
          <div style="margin-bottom:20px;">
            <h3 style="margin:0;">Seções cadastradas</h3>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive">
              <tr align="center">
                <td align="left"><a href=""><b>Imagem</b></a></td>  
                <td align="left"><a href=""><b>Ativo</b></a></td>
                <td align="center"><a href=""><b>Editar Seção/Postagens</b></a></td>       
                <td align="left"><a href=""><b>Seção</b></a></td>
                <td align="left"><a href=""><b>Titulo</b></a></td>
              </tr>
              @foreach($secoes as $secao)
                <tr style="text-align:center;">
                  <td style="width:0; vertical-align:middle;">
                    @if (file_exists(public_path('uploads/secao-'.$secao->id.'.jpg')))
                      <img style="width: 75px; height: 50px; object-fit: cover; max-width: none;" class="img-thumbnail" src="{{asset('uploads/secao-'.$secao->id.'-thumbs.jpg').'?'.time()}}">
                    @endif
                  </td>      
                  <td style="text-align:center; vertical-align:middle; width:0; white-space:nowrap;">
                    @if ($secao->inativo == 1)
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#a94442" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @else
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#3c763d" class="bi bi-toggle-on" viewBox="0 0 16 16">
                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                      </svg>
                    @endif
                  </td>
                  <td style="width:0; vertical-align:middle; white-space:nowrap;">
                    <a class="btn btn-sm btn-primary" href="{{route('secoes', $secao->id)}}">
                      Editar Seção
                    </a>
                    <a class="btn btn-sm btn-success" href="{{route('postagens', $secao->id)}}">
                      Ver Posts ({{$secao->postagens->count()}})
                    </a>
                  </td>
                  <td style="vertical-align:middle; text-align:left;">{{$secao->nome}}</td>
                  <td style="vertical-align:middle; text-align:left;">{{$secao->titulo}}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection