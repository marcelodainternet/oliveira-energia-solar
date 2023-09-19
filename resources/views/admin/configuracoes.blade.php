@extends("admin.layout")

@section("head")
    <title>Configurações Gerais - Admin</title>
    <script src="{{asset('admin/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript">
        tinyMCE.init({
            mode: "textareas",
            theme: "modern",
            language: "pt_BR",
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
            ],
            toolbar1: "searchreplace | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | removeformat",
            toolbar2: "cut copy paste | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media table | hr charmap emoticons | forecolor backcolor",
            menubar: false,
            toolbar_items_size: 'small',
            style_formats: [
                {
                    title: 'Bold text',
                    inline: 'b'
                },
                {
                    title: 'Red text',
                    inline: 'span',
                    styles: {
                            color: '#ff0000'
                    }
                },
                {
                    title: 'Red header',
                    block: 'h1',
                    styles: {
                            color: '#ff0000'
                    }
                },
                {
                    title: 'Example 1',
                    inline: 'span',
                    classes: 'example1'
                },
                {
                    title: 'Example 2',
                    inline: 'span',
                    classes: 'example2'
                },
                {
                    title: 'Table styles'
                },
                {
                    title: 'Table row 1',
                    selector: 'tr',
                    classes: 'tablerow1'
                }
            ],
            templates: [
                {
                        title: 'Test template 1',
                        content: 'Test 1'
                },
                {
                        title: 'Test template 2',
                        content: 'Test 2'
                }
            ]
        });
    </script>
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
          <?php
          // altera no banco
          /* if (isset($_POST['editar']) && $_POST['editar'] != '') :
            $sql = "UPDATE configuracoes SET 
              site = '{$_POST["site"]}', 
              titulo = '{$_POST["titulo"]}',
              subtitulo = '{$_POST['subtitulo']}', 
              descricao = '{$_POST['descricao']}', 
              p_chaves = '{$_POST['p_chaves']}', 
              email = '{$_POST["email"]}', 
              email2 = '{$_POST["email2"]}', 
              email3 = '{$_POST["email3"]}',
              telefone = '{$_POST["telefone"]}', 
              telefone2 = '{$_POST["telefone2"]}', 
              telefone3 = '{$_POST["telefone3"]}', 
              cep = '{$_POST["cep"]}', 
              endereco = '{$_POST["endereco"]}', 
              numero = '{$_POST["numero"]}', 
              complemento = '{$_POST["complemento"]}', 
              bairro = '{$_POST["bairro"]}', 
              cidade = '{$_POST["cidade"]}', 
              estado = '{$_POST["estado"]}', 
              endereco2 = '{$_POST["endereco2"]}', 
              endereco3 = '{$_POST["endereco3"]}', 
              horatend = '{$_POST["horatend"]}', 
              horatend2 = '{$_POST["horatend2"]}', 
              horatend3 = '{$_POST["horatend3"]}', 
              info   = '{$_POST["info"]}', 
              whatstxt   = '{$_POST["whatstxt"]}', 
              whatstxt2   = '{$_POST["whatstxt2"]}', 
              whatstxt3   = '{$_POST["whatstxt3"]}', 
              instagram = '{$_POST["instagram"]}', 
              facebook = '{$_POST["facebook"]}', 
              youtube = '{$_POST["youtube"]}', 
              google_maps = '{$_POST["google_maps"]}', 
              play_store = '{$_POST["play_store"]}', 
              apple_store = '{$_POST["apple_store"]}',
              linkedin = '{$_POST["linkedin"]}',
              twitter = '{$_POST["twitter"]}', 
              tiktok = '{$_POST["tiktok"]}',
              termos = '{$_POST["termos"]}', 
              privacidade = '{$_POST["privacidade"]}', 
              cookies = '{$_POST["cookies"]}' 
              WHERE id = {$_POST["editar"]}";
            $resultado = $db->query($sql);
            $id = $_POST['editar'];
          ?>
            <h3 class="alert alert-success" role="alert">Configuração alterada com sucesso!
              <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
            </h3>
          <?php
          endif; */
  
          // funcao que redimensiona a foto
          /* function arruma_foto($filename, $maximo)
          {
            list($width, $height) = getimagesize($filename);
            if ($width >= $height) {
              $newwidth = $maximo;
              $newheight = $maximo * $height / $width;
            } else {
              $newheight = $maximo;
              $newwidth = $width * $maximo / $height;
            }
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($filename);
            imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            $arquivo_gravado = imagejpeg($thumb, $filename, 80);
          } */
  
          // grava as fotos
          /* for ($x = 1; $x <= 2; $x++) {
            if (isset($_FILES['foto' . $x])) {
              if (is_uploaded_file($_FILES['foto' . $x]['tmp_name'])) {
                move_uploaded_file($_FILES['foto' . $x]['tmp_name'], '../imagens/configuracoes/' . $id . '.' . $x . '.jpg');
                copy('../imagens/configuracoes/' . $id . '.' . $x . '.jpg', '../imagens/configuracoes/thumbs/' . $id . '.' . $x . '.jpg');
                copy('../imagens/configuracoes/' . $id . '.' . $x . '.jpg', '../imagens/configuracoes/grande/' . $id . '.' . $x . '.jpg');
                arruma_foto('../imagens/configuracoes/' . $id . '.' . $x . '.jpg', 800);
                arruma_foto('../imagens/configuracoes/thumbs/' . $id . '.' . $x . '.jpg', 400);
                arruma_foto('../imagens/configuracoes/grande/' . $id . '.' . $x . '.jpg', 1600);
              }
            }
          } */
  
          // Edita a imagem
          /* if (is_file('../imagens/configuracoes/' . $_GET['editar'] . '.' . $x . '.jpg')) {
            unlink('../imagens/configuracoes/' . $_GET['editar'] . '.' . $x . '.jpg');
            unlink('../imagens/configuracoes/grande/' . $_GET['editar'] . '.' . $x . '.jpg');
            unlink('../imagens/configuracoes/thumbs/' . $_GET['editar'] . '.' . $x . '.jpg');
          } */
  
          // Carrega os dados para edição
          /* if (isset($_GET['editar'])) {
            $sql = 'SELECT * FROM configuracoes WHERE id = \'' . $_GET['editar'] . '\'';
            $res = $db->query($sql);
            $configuracao = $res->result->fetch_all(MYSQLI_BOTH)[0];
  
            $nome = $configuracao["nome"];
            $fone = $configuracao["fone"];
            $mail = $configuracao["mail"];
  
            $logo = $configuracao["logo"];
            $site = $configuracao["site"];
            $site2 = $configuracao["site2"];
            $site3 = $configuracao["site3"];
  
            $titulo = $configuracao["titulo"];
            $subtitulo = $configuracao["subtitulo"];
            $descricao = $configuracao["descricao"];
            $p_chaves = $configuracao["p_chaves"];
  
            $email = $configuracao["email"];
            $email2 = $configuracao["email2"];
            $email3 = $configuracao["email3"];
  
            $telefone = $configuracao["telefone"];
            $telefone2 = $configuracao["telefone2"];
            $telefone3 = $configuracao["telefone3"];
  
            $cep = $configuracao["cep"];
            $endereco = $configuracao["endereco"];
            $numero = $configuracao["numero"];
            $complemento = $configuracao["complemento"];
            $bairro = $configuracao["bairro"];
            $cidade = $configuracao["cidade"];
            $estado = $configuracao["estado"];
            $endereco2 = $configuracao["endereco2"];
            $endereco3 = $configuracao["endereco3"];
  
            $horatend = $configuracao["horatend"];
            $horatend2 = $configuracao["horatend2"];
            $horatend3 = $configuracao["horatend3"];
  
            $info = $configuracao["info"];
  
            $whatstxt = $configuracao["whatstxt"];
            $whatstxt2 = $configuracao["whatstxt2"];
            $whatstxt3 = $configuracao["whatstxt3"];
  
            $instagram = $configuracao["instagram"];
            $facebook = $configuracao["facebook"];
            $youtube = $configuracao["youtube"];
            $google_plus = $configuracao["google_plus"];
            $google_maps = $configuracao["google_maps"];
            $play_store = $configuracao["play_store"];
            $apple_store = $configuracao["apple_store"];
            $linkedin = $configuracao["linkedin"];
            $twitter = $configuracao["twitter"];
            $tiktok = $configuracao["tiktok"];
  
            $termos = $configuracao["termos"];
            $privacidade = $configuracao["privacidade"];
            $contrato = $configuracao["contrato"];
            $contrato2 = $configuracao["contrato2"];
            $contrato3 = $configuracao["contrato3"];
  
            $cookies = $configuracao["cookies"];
            $push = $configuracao["push"];
            $push2 = $configuracao["push2"];
            $push3 = $configuracao["push3"];
  
            $cor = $configuracao["cor"];
            $cor2 = $configuracao["cor2"];
            $cor3 = $configuracao["cor3"];
            $cor4 = $configuracao["cor4"];
            $cor5 = $configuracao["cor5"];
            $cor6 = $configuracao["cor6"];
  
            $cortxt = $configuracao["cortxt"];
            $cortxt2 = $configuracao["cortxt2"];
            $cortxt3 = $configuracao["cortxt3"];
            $cortxt4 = $configuracao["cortxt4"];
            $cortxt5 = $configuracao["cortxt5"];
            $cortxt6 = $configuracao["cortxt6"];
  
            $alinhamento = $configuracao["alinhamento"];
            $container = $configuracao["container"];
            $borda = $configuracao["borda"];
            $arredondado = $configuracao["arredondado"];
            $sombra = $configuracao["sombra"];
            $parallax = $configuracao["parallax"];
            $background_color = $configuracao["background_color"];
            $background_img = $configuracao["background_img"];
          }
  
          if (isset($_GET['remover_foto'])) {
            if (is_file('../imagens/configuracoes/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg')) {
              unlink('../imagens/configuracoes/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/configuracoes/grande/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/configuracoes/thumbs/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
            }
          } */
          ?>
          <form action="./?area=configuracoes&editar=1" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class="row">
                <!--
                <div class="form-group col-md-4">
                  <label>Nome do responsável:</label>
                  <input type="text" class="form-control" name="nome" id="nome" value="<?php //echo $nome; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>Telefone do responsável:</label>
                  <input type="text" class="form-control" name="fone" id="fone" value="<?php //echo $fone; ?>">
                </div>
                <div class="form-group col-md-4">
                  <label>E-mail do responsável:</label>
                  <input type="text" class="form-control" name="mail" id="mail" value="<?php //echo $mail; ?>">
                </div>
               <div class="form-group col-md-2">
                  <label>Cor Primária:</label>
                  <input type="text" class="form-control" name="cor" id="cor" value="<?php //echo $cor; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor Segundária:</label>
                  <input type="text" class="form-control" name="cor2" id="cor2" value="<?php //echo $cor2; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor Terciária:</label>
                  <input type="text" class="form-control" name="cor3" id="cor3" value="<?php //echo $cor3; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor Quarta:</label>
                  <input type="text" class="form-control" name="cor4" id="cor4" value="<?php //echo $cor4; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor Quinta:</label>
                  <input type="text" class="form-control" name="cor5" id="cor5" value="<?php //echo $cor5; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor Sexta:</label>
                  <input type="text" class="form-control" name="cor6" id="cor6" value="<?php //echo $cor6; ?>">
                </div>
               <div class="form-group col-md-2">
                  <label>Cor TXT Primária:</label>
                  <input type="text" class="form-control" name="cortxt" id="cortxt" value="<?php //echo $cortxt; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor TXT Segund.:</label>
                  <input type="text" class="form-control" name="cortxt2" id="cortxt2" value="<?php //echo $cortxt2; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor TXT Terciária:</label>
                  <input type="text" class="form-control" name="cortxt3" id="cortxt3" value="<?php //echo $cortxt3; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor TXT Quarta:</label>
                  <input type="text" class="form-control" name="cortxt4" id="cortxt4" value="<?php //echo $cortxt4; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor TXT Quinta:</label>
                  <input type="text" class="form-control" name="cortxt5" id="cortxt5" value="<?php //echo $cortxt5; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label>Cor TXT Sexta:</label>
                  <input type="text" class="form-control" name="cortxt6" id="cortxt6" value="<?php //echo $cortxt6; ?>">
                </div>
            -->
                <!-- Multiple Checkboxes (inline) background 
             <div class="form-group col-md-2">
               <label>Cor de Fundo</label>
               <input type="text" id="background_color" name="background_color" placeholder="" class="form-control" value="<?php //echo $background_color ?>">
           </div> 
               -->
                <!-- Select Secao  
            <div class="form-group col-md-2">
            <label>Alinhamento</label>
            <select name="alinhamento" id="alinhamento" class="form-control">
              <option selected="selected"><?php //echo $alinhamento; ?></option>
              <option value="Center">Center</option>
              <option value="Left">Left</option>
              <option value="Right">Right</option>
            </select>
                </div>
            -->
                <!-- Multiple Checkboxes (inline) container
                  <div align="left" class="form-group col-md-2">
                    <label class="control-label" for="container">Container:</label><br>
                      <label class="checkbox-inline" for="container-0">
                        <input type="checkbox" id="container-0"  name="container"value="1" <?php //if ($container == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
             -->
                <!-- Multiple Checkboxes (inline) Borda 
                  <div align="left" class="form-group col-md-2">
                    <label class="control-label" for="borda">Borda:</label><br>
                      <label class="checkbox-inline" for="borda-0">
                        <input type="checkbox" id="borda-0"  name="borda"value="1" <?php //if ($borda == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
            -->
                <!-- Multiple Checkboxes (inline) Arredondado
                  <div align="left" class="form-group col-md-2">
                    <label class="control-label" for="arredondado">Arredondado:</label><br>
                      <label class="checkbox-inline" for="arredondado-0">
                        <input type="checkbox" id="arredondado-0"  name="arredondado"value="1" <?php //if ($arredondado == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
             -->
                <!-- Multiple Checkboxes (inline) Sombra
                  <div align="left" class="form-group col-md-2">
                    <label class="control-label" for="sombra">Sombra:</label><br>
                      <label class="checkbox-inline" for="sombra-0">
                        <input type="checkbox" id="sombra-0"  name="sombra"value="1" <?php //if ($sombra == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div> -->
  
              </div>
              <div class="row">
                
                <div class="form-group col-md-5">
                  <label>Imagem</label><br>
                  @if(file_exists(public_path('imagens/configuracoes/1.1.jpg')))
                    <div style="position: relative; display:inline-block;">
                      <label for="foto1">
                        <img class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;" src="{{asset('imagens/configuracoes/1.1.jpg')}}" alt="1" title="1">
                      </label>
                      <a style="position: absolute; right: 1px; top: 1px; padding: 2px; background: #fff; border: 1px solid #ddd; border-width: 0 0 1px 1px; border-radius: 0 0 0 5px; line-height: 1;" class="text-danger" href="./?area=secoes&editar=$secao&remover_foto=1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                      </a>
                    </div>
                  @else
                  <label for="foto1"><img class="img-thumbnail" style="width: 225px; height: 150px; object-fit: contain;" src="{{asset('/admin/assets/img/padrao.jpg')}}" alt="1" title="1"></label>
                  @endif
                  <input class="form-control input hidden" style="vertical-align:middle;" name="foto1" type="file" id="foto1"/>
                </div>

                <!-- Multiple Checkboxes (inline) Parallax 
                <div align="left" class="form-group col-md-2">
                  <label class="control-label" for="parallax">Parallax:</label><br>
                    <label class="checkbox-inline" for="parallax-0">
                      <input type="checkbox" id="parallax-0"  name="parallax"value="1" <?php //if ($parallax == 1) { ?>checked="checked"<?php //} ?> >
                      SIM </label>
                </div>
                -->
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
                <!--
                  <div class="form-group col-md-12">
                    <label>Endereço Completo 2:</label>
                    <input type="text" class="form-control" name="endereco2" id="vendereco2" value="{{$configuracao['endereco2']}}">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Endereço Completo 3:</label>
                    <input type="text" class="form-control" name="endereco3" id="endereco3" value="{{$configuracao['endereco3']}}">
                  </div>
                -->
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
                  <label>Cookies:</label>
                  <textarea class="form-control" name="cookies" id="cookies" rows="8">{{$configuracao['cookies']}}</textarea>
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
                  <input type="submit" id="editar" name="editar" class="btn btn-success btn-block" value="EDITAR CONFIGURAÇÃO">
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