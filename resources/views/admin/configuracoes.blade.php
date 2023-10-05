@extends("admin.layout")

@section("head")
    <title>Configurações Gerais - Admin</title>
    <script src="{{asset('assets/libs/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/richtext-editor.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/upload-image.js')}}"></script>
@endsection

@section("content")

<div class="row">
    <div class="col-md-12">
      <h2 class="page-head-line"><a href="./"><i class="ace-icon fa fa-home home-icon"></i></a> | Configurações Gerais</h2>
      <h4 class="panel-default text-info">Edite as CONFIGURAÇÕES do seu site! </h4>
    </div>
  </div>
  <br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-12">
          @if(session()->get("saved"))
            <div class="alert alert-success" role="alert">Configuração alterada com sucesso!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif
          <form method="post" action="{{route('configuracoes.atualizar')}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <fieldset>
              <div class="row">
                <div class="form-group col-md-5">
                  <label>Imagem</label><br>
                  <x-upload-image fallback="{{asset('assets/img/padrao.png')}}" path="uploads/imagem-principal.jpg" name="imagem"/>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label>Site (URL):</label>
                  <input type="text" class="form-control" name="site" id="site" value="{{$configuracao['site']}}">
                </div>
                <div class="form-group col-md-8">
                  <label>Título:</label>
                  <input type="text" class="form-control" name="titulo" id="titulo" value="{{$configuracao['titulo']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Subtítulo:</label>
                  <input type="text" class="form-control" name="subtitulo" id="subtitulo" value="{{$configuracao['subtitulo']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Descrição:</label>
                  <input type="text" class="form-control" name="descricao" id="descricao" value="{{$configuracao['descricao']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Palavras Chaves:</label>
                  <input type="text" class="form-control" name="p_chaves" id="p_chaves" value="{{$configuracao['p_chaves']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>E-mail:</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{$configuracao['email']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>E-mail 2:</label>
                  <input type="text" class="form-control" name="email2" id="email2" value="{{$configuracao['email2']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>E-mail 3:</label>
                  <input type="text" class="form-control" name="email3" id="email3" value="{{$configuracao['email3']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Telefone*: (whatsapp)</label>
                  <input type="text" class="form-control" name="telefone" id="telefone" value="{{$configuracao['telefone']}}" required>
                </div>
                <div class="form-group col-md-4">
                  <label>Telefone 2:</label>
                  <input type="text" class="form-control" name="telefone2" id="telefone2" value="{{$configuracao['telefone2']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Telefone3:</label>
                  <input type="text" class="form-control" name="telefone3" id="telefone3" value="{{$configuracao['telefone3']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Endereço completo:</label>
                  <input type="text" class="form-control" name="endereco" id="endereco" value="{{$configuracao['endereco']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Horário de Atendimento:</label>
                  <input type="text" class="form-control" name="horatend" id="horatend" value="{{$configuracao['horatend']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Horário de Atendimento 2:</label>
                  <input type="text" class="form-control" name="horatend2" id="horatend2" value="{{$configuracao['horatend2']}}">
                </div>
                <div class="form-group col-md-4">
                  <label>Horário de Atendimento 3:</label>
                  <input type="text" class="form-control" name="horatend3" id="horatend3" value="{{$configuracao['horatend3']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Texto whatsapp:</label>
                  <input type="text" class="form-control" name="whatstxt" id="whatstxt" value="{{$configuracao['whatstxt']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Texto whatsapp 2:</label>
                  <input type="text" class="form-control" name="whatstxt2" id="whatstxt2" value="{{$configuracao['whatstxt2']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Texto whatsapp 3:</label>
                  <input type="text" class="form-control" name="whatstxt3" id="whatstxt3" value="{{$configuracao['whatstxt3']}}">
                </div>
  
                <!--
                  <div class="form-group col-md-12">
                    <label>Informações Extras:</label>
                    <input type="text" class="form-control" name="info" id="info" value="<?php //echo $info; ?>">
                  </div>
  
                  <div class="form-group col-md-12">
                    <label>Informações Extras 2:</label>
                    <input type="text" class="form-control" name="info2" id="info2" value="<?php //echo $info2; ?>">
                  </div>
  
                  <div class="form-group col-md-12">
                    <label>Informações Extras 3:</label>
                    <input type="text" class="form-control" name="info3" id="info3" value="<?php //echo $info3; ?>">
                  </div>
  
                  <div class="form-group col-md-12">
                    <label>Informações Extras 4:</label>
                    <input type="text" class="form-control" name="info4" id="info4" value="<?php //echo $info4; ?>">
                  </div>
  
                  <div class="form-group col-md-12">
                    <label>Informações Extras 5:</label>
                    <input type="text" class="form-control" name="info5" id="info5" value="<?php //echo $info5; ?>">
                  </div>
                -->

                <div class="form-group col-md-6">
                  <label>Instagram:</label>
                  <input type="text" class="form-control" name="instagram" id="instagram" value="{{$configuracao['instagram']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Facebook:</label>
                  <input type="text" class="form-control" name="facebook" id="facebook" value="{{$configuracao['facebook']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Youtube:</label>
                  <input type="text" class="form-control" name="youtube" id="youtube" value="{{$configuracao['youtube']}}">
                </div>

                <!--
                  <div class="form-group col-md-6">
                    <label>Google Plus:</label>
                    <input type="text" class="form-control" name="google_plus" id="google_plus" value="{{$configuracao['google_plus']}}">
                  </div>
                -->

                <div class="form-group col-md-6">
                  <label>Likedin:</label>
                  <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$configuracao['linkedin']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Twitter:</label>
                  <input type="text" class="form-control" name="twitter" id="twitter" value="{{$configuracao['twitter']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>TikTok:</label>
                  <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{$configuracao['tiktok']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Play Store:</label>
                  <input type="text" class="form-control" name="play_store" id="play_store" value="{{$configuracao['play_store']}}">
                </div>
                <div class="form-group col-md-6">
                  <label>Apple Store:</label>
                  <input type="text" class="form-control" name="apple_store" id="apple_store" value="{{$configuracao['apple_store']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Google Maps:</label>
                  <input type="text" class="form-control" name="google_maps" id="google_maps" value="{{$configuracao['google_maps']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Aviso de Cookies:</label>
                  <input type="text" class="form-control" name="info" id="info" value="{{$configuracao['info']}}">
                </div>
                <div class="form-group col-md-12">
                  <label>Política de Cookies:</label>
                  <textarea class="form-control" name="politica_cookies" id="cookies" rows="8">{{$configuracao['cookies']}}</textarea>
                </div>
                <div class="form-group col-md-12">
                  <label>Termos de uso:</label>
                  <textarea class="form-control" name="termos" id="termos" rows="8">{{$configuracao['termos']}}</textarea>
                </div>
                <div class="form-group col-md-12">
                  <label>Política de Privacidade:</label>
                  <textarea class="form-control" name="privacidade" id="privacidade" rows="8">{{$configuracao['privacidade']}}</textarea>
                </div>
                <!--
                  <div class="form-group col-md-12">
                    <label>Push:</label>
                    <textarea class="form-control" name="push" id="push" rows="8"><?php //echo $push ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Push 2:</label>
                    <textarea class="form-control" name="push2" id="push2" rows="8"><?php //echo $push2 ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Push 3:</label>
                    <textarea class="form-control" name="push3" id="push3" rows="8"><?php //echo $push3 ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Contrato:</label>
                    <textarea class="form-control" name="contrato" id="contrato" rows="8"><?php //echo $contrato ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Contrato 2:</label>
                    <textarea class="form-control" name="contrato2" id="contrato2" rows="8"><?php //echo $contrato2 ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Contrato 3:</label>
                    <textarea class="form-control" name="contrato3" id="contrato3" rows="8"><?php //echo $contrato3 ?></textarea>
                  </div>
                -->
                <!-- File Button Enviar -->
                <div class="form-group col-md-12">
                  <label class="control-label" for="filebutton"></label>
                  <input type="submit" id="editar" name="editar" class="btn btn-success btn-block" value="SALVAR">
                  <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php //echo $_GET['editar'] ?>">
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection