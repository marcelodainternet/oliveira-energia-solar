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
  <br />
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-5 {{$foto??'hidden'}}">
          <h3>Cadastro de Fotos em Projetos</h3>
          <p>&nbsp;</p>
          <?php
            /* if ($_POST) {

                // formata a data no padróo mysql
                $data_expira = explode('/', $_POST['data_expira']);
                $data_expira = $data_expira[2] . '-' . $data_expira[1] . '-' . $data_expira[0];

                // altera no banco 
                if ($_POST['editar'] != '') {
                  $sql = 'UPDATE subcategorias SET 
                  ordem = \'' . $_POST['ordem'] . '\', 
                  inativo = \'' . $_POST['inativo'] . '\', 
                  data_expira = \'' . date('Y-m-d') . '\',
                  categoria_id = \'' . $_POST['categoria'] . '\',
                  nome = \'' . $_POST['nome'] . '\', 
                  imagem = \'' . $_POST['imagem'] . '\', 
                  titulo = \'' . $_POST['titulo'] . '\', 
                  subtitulo = \'' . $_POST['subtitulo'] . '\', 
                  descricao = \'' . $_POST['descricao'] . '\', 
                  alinhamento = \'' . $_POST['alinhamento'] . '\',
                  container = \'' . $_POST['container'] . '\',
                  borda = \'' . $_POST['borda'] . '\',
                  arredondado = \'' . $_POST['arredondado'] . '\',
                  sombra = \'' . $_POST['sombra'] . '\',
                  background_color = \'' . $_POST['background_color'] . '\',
                  background_img = \'' . $_POST['background_img'] . '\',
                  parallax = \'' . $_POST['parallax'] . '\'

                  WHERE id = \'' . $_POST['editar'] . '\'';
                  $res = mysql_query($sql);
                  $id = $_POST['editar'];
          ?>
          <p class="alert alert-success" role="alert">Postagem alterada com sucesso!
            <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
          </p>
          <?php
            } else {

              // Insere no banco 
              $sql = 'INSERT INTO subcategorias SET 
              ordem = \'' . $_POST['ordem'] . '\', 
              inativo = \'' . $_POST['inativo'] . '\', 
              data_expira = \'' . date('Y-m-d') . '\',
              categoria_id = \'' . $_POST['categoria'] . '\',
              nome = \'' . $_POST['nome'] . '\', 
              imagem = \'' . $_POST['imagem'] . '\', 
              titulo = \'' . $_POST['titulo'] . '\', 
              subtitulo = \'' . $_POST['subtitulo'] . '\', 
              descricao = \'' . $_POST['descricao'] . '\', 
              alinhamento = \'' . $_POST['alinhamento'] . '\',
              container = \'' . $_POST['container'] . '\',
              borda = \'' . $_POST['borda'] . '\',
              arredondado = \'' . $_POST['arredondado'] . '\',
              sombra = \'' . $_POST['sombra'] . '\',
              background_color = \'' . $_POST['background_color'] . '\',
              background_img = \'' . $_POST['background_img'] . '\',
              parallax = \'' . $_POST['parallax'] . '\',

              data_cadastro = \'' . date('Y-m-d H:i') . '\'';
              $res = mysql_query($sql);
              $id = mysql_insert_id(); 

          ?>
          <p class="alert alert-success" role="alert">Postagem cadastrada com sucesso!
            <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
          </p>
          <?php
              }

              // funcao que redimensiona a foto
              function arruma_foto($filename, $maximo)
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
              }

              // grava as fotos
              for ($x = 1; $x <= 10; $x++) {
                if (is_uploaded_file($_FILES['foto' . $x]['tmp_name'])) {
                  move_uploaded_file($_FILES['foto' . $x]['tmp_name'], '../imagens/subcategorias/' . $id . '.' . $x . '.jpg');
                  copy('../imagens/subcategorias/' . $id . '.' . $x . '.jpg', '../imagens/subcategorias/thumbs/' . $id . '.' . $x . '.jpg');
                  copy('../imagens/subcategorias/' . $id . '.' . $x . '.jpg', '../imagens/subcategorias/grande/' . $id . '.' . $x . '.jpg');
                  arruma_foto('../imagens/subcategorias/' . $id . '.' . $x . '.jpg', 800);
                  arruma_foto('../imagens/subcategorias/thumbs/' . $id . '.' . $x . '.jpg', 400);
                  arruma_foto('../imagens/subcategorias/grande/' . $id . '.' . $x . '.jpg', 1600);
                }
              }
            }

            // Exclui do banco
            if (isset($_GET['excluir'])) {
              $sql = 'DELETE FROM subcategorias WHERE id = \'' . $_GET['excluir'] . '\'';
              $res = mysql_query($sql);

              // Edita a imagem
              if (is_file('../imagens/subcategorias/' . $_GET['editar'] . '.' . $x . '.jpg')) {
                unlink('../imagens/subcategorias/' . $_GET['editar'] . '.' . $x . '.jpg');
                unlink('../imagens/subcategorias/grande/' . $_GET['editar'] . '.' . $x . '.jpg');
                unlink('../imagens/subcategorias/thumbs/' . $_GET['editar'] . '.' . $x . '.jpg');
              }

          ?>
          <p class="alert alert-danger" role="alert">Postagem escluída com sucesso!
            <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
          </p>
          <?php
            }

            // Altera o inativo
            if (isset($_GET['inativo']) && $_GET['inativo'] != '') {
              $sql = 'UPDATE subcategorias SET inativo = \'' . $_GET['inativo'] . '\' WHERE id = \'' . $_GET['id'] . '\'';
              $res = mysql_query($sql);
            }

            // Carrega os dados para edição
            if (isset($_GET['editar'])) {
              $sql = 'SELECT * FROM subcategorias WHERE id = \'' . $_GET['editar'] . '\'';
              $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for ($i = 0; $i < $num; $i++) {
                $data_expira = mysql_result($res, $i, 'data_expira');
                $ordem = mysql_result($res, $i, 'ordem');
                $inativo = mysql_result($res, $i, 'inativo');
                $categoria_id = mysql_result($res, $i, 'categoria_id');
                $nome = mysql_result($res, $i, 'nome');
                $titulo = mysql_result($res, $i, 'titulo');
                $subtitulo = mysql_result($res, $i, 'subtitulo');
                $descricao = mysql_result($res, $i, 'descricao');
                $alinhamento = mysql_result($res, $i, 'alinhamento');
                $container = mysql_result($res, $i, 'container');
                $borda = mysql_result($res, $i, 'borda');
                $arredondado = mysql_result($res, $i, 'arredondado');
                $sombra = mysql_result($res, $i, 'sombra');
                $background_color = mysql_result($res, $i, 'background_color');
                $background_img = mysql_result($res, $i, 'background_img');
                $parallax = mysql_result($res, $i, 'parallax');

                // Formata a data no padrao Brasileiro
                $data_expira = explode('-', $data_expira);
                $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0];
              }
            }

            // Exclui a foto
            if (isset($_GET['remover_foto'])) {
              if (is_file('../imagens/subcategorias/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg')) {
                unlink('../imagens/subcategorias/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
                unlink('../imagens/subcategorias/grande/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
                unlink('../imagens/subcategorias/thumbs/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              }
            } */
          ?>
          <form action="{{$foto?route('fotos.atualizar', ['projeto' => $projeto->id, 'foto' => $foto->id]):''}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
            @csrf
            @method('put')
            <fieldset>
              <div class="row">
                <!-- Text input ordem 
                  <div class="form-group col-md-3">
                    <label>Ordem</label>
                    <input type="text" id="ordem" name="ordem" placeholder="" class="form-control" value="<?php if ($foto) echo $foto->ordem ?>">
                  </div>
                -->

                <!-- Text input data expira
                  <div class="form-group">
                    <label>Data Expira</label>
                    <input type="text" id="data_expira" name="data_expira" placeholder="Data Expira: Ex: 02/01/2016" class="form-control" value="<?php if ($foto && $foto->data_expira != '00/00/0000') {
                                                                                                                                                      echo $foto->data_expira;
                                                                                                                                                    } ?>">
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) container
                  <div align="left" class="form-group  col-md-3">
                    <label class="control-label" for="container">Container:</label>
                      <label class="checkbox-inline" for="container-0">
                        <input type="checkbox" id="container-0"  name="container"value="1" <?php //if ($foto && $container == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) Borda
                  <div align="left" class="form-group  col-md-3">
                    <label class="control-label" for="borda">Borda:</label>
                      <label class="checkbox-inline" for="borda-0">
                        <input type="checkbox" id="borda-0"  name="borda"value="1" <?php //if ($foto && $borda == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) Arredondado
                  <div align="left" class="form-group c col-md-4">
                    <label class="control-label" for="arredondado">Arredondado:</label>
                      <label class="checkbox-inline" for="arredondado-0">
                        <input type="checkbox" id="arredondado-0"  name="arredondado"value="1" <?php //if ($foto && $arredondado == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) Sombra
                  <div align="left" class="form-group  col-md-4">
                    <label class="control-label" for="sombra">Sombra:</label>
                      <label class="checkbox-inline" for="sombra-0">
                        <input type="checkbox" id="sombra-0"  name="sombra"value="1" <?php //if ($foto && $sombra == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) background
                  <div class="form-group col-md-4">
                    <label>Cor de Fundo</label>
                    <input type="text" id="background_color" name="background_color" placeholder="" class="form-control" value="<?php //if ($foto) echo $background_color ?>">
                  </div> 
                -->

                <!-- Select Alinhamento 
                  <div class="form-group col-md-4">
                    <label>Alinhamento</label>
                    <select name="alinhamento" id="alinhamento" class="form-control">
                      <option><?php //if ($foto) echo $alinhamento ?>
                      <option value="Center">Center</option>
                      <option value="Left">Left</option>
                      <option value="Right">Right</option>
                    </select>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) Arredondado 
                  <div align="left" class="form-group c col-md-2">
                    <label class="control-label" for="parallax">Parallax:</label>
                      <label class="checkbox-inline" for="parallax-0">
                        <input type="checkbox" id="parallax-0"  name="parallax"value="1" <?php //if ($foto && $parallax == 1) { ?>checked="checked"<?php //} ?> >
                        SIM </label>
                  </div>
                -->

                <!-- Multiple Checkboxes (inline) Inativo 
                  <div align="left" class="form-group  col-md-6">
                    <label class="control-label" for="inativo">Inativo:</label>
                      <label class="checkbox-inline" for="inativo-0">
                        <input type="checkbox" id="inativo-0"  name="inativo"value="1" <?php //if ($foto && $inativo == 1) { ?>checked="checked"<?php //} ?>>
                        SIM </label>
                  </div>
                -->

                <div class="form-group col-md-6">
                  <label>Imagem</label><br>
                  @if($foto)
                    <x-upload-image fallback="{{asset('/assets/img/padrao.png')}}" path="uploads/projeto-foto-{{$foto->id}}.jpg" name="imagem"/>
                  @endif
                </div>

                <!-- Select categoria -->
                <!-- <div class="form-group col-md-12">
                  <label>Escolha o PROJETO da Postagem* (Obrigatório)</label>
                  <select required name="categoria" id="categoria" class="form-control">
                    <option><?php echo $categoria ?? ''; ?>
                      <?php
                        // $sql = 'SELECT * FROM categorias ORDER BY nome ASC LIMIT 6 OFFSET 5';
                        /* $resultado = $db->query("SELECT * FROM categorias WHERE categorias.inativo = 0 ORDER BY id");
                        $categorias = $resultado->result->fetch_all(MYSQLI_BOTH);
                        foreach ($categorias as $categoria) {
                          $id = $categoria["id"];
                      ?>
                        <option value="<?php echo $id ?>" <?php if ($id == $categoria_id) { ?>selected="selected" <?php } ?>><?php echo $categoria["nome"]; ?></option>
                      <?php
                        } */
                      ?>
                  </select>
                  <span class="selectRequiredMsg">Selecione um item ou</span><a href="./?area=categorias" data-target="#categorias"> Cadastre novo projeto</a>
                </div> -->

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
                  <label class="control-label" for="filebutton"></label>
                  <input type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" value="Cadastrar">
                  <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php if (isset($_GET['editar'])) echo $_GET['editar'] ?>">
                </div>
            </fieldset>
          </form>
        </div>

        <div class="{{$foto?'col-md-7':'col-md-12'}}">
          <h3>Fotos cadastradas</h3>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive">
              <tr align="center">
                <td><strong><a href="./?area=subcategorias&ordenar=id&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                              echo 'ASC';
                                                                            } else {
                                                                              echo 'DESC';
                                                                            } ?>">ID</a></strong>
                </td>

                <td><strong><a href="./?area=subcategorias&ordenar=subcategorias.inativo&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                                  echo 'ASC';
                                                                                                } else {
                                                                                                  echo 'DESC';
                                                                                                } ?>">Ativo</a></strong>
                </td>
                
                <td><strong><a href="./?area=subcategorias&ordenar=id&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                              echo 'ASC';
                                                                            } else {
                                                                              echo 'DESC';
                                                                            } ?>">Imagem</a></strong>
                </td>
                
                <td><strong><a href="./?area=subcategorias&ordenar=categorias.nome&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                            echo 'ASC';
                                                                                          } else {
                                                                                            echo 'DESC';
                                                                                          } ?>">Projeto</a></strong>
                </td>

                <td align="left"><strong><a href="./?area=subcategorias&ordenar=subcategorias.nome&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                                            echo 'ASC';
                                                                                                          } else {
                                                                                                            echo 'DESC';
                                                                                                          } ?>">Postagem</a></strong>
                </td>

                <!--
                  <td align="left"><strong><a href="./?area=subcategorias&ordenar=titulo&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                                  echo 'ASC';
                                                                                                } else {
                                                                                                  echo 'DESC';
                                                                                                } ?>">Título</a></strong></td>
                  <td align="left"><strong><a href="./?area=subcategorias&ordenar=subtitulo&ordem=<?php if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                                    echo 'ASC';
                                                                                                  } else {
                                                                                                    echo 'DESC';
                                                                                                  } ?>">Subtítulo</a></strong></td>
                -->

                <td></td>
              </tr>
              <?php

                // Define a ordem
                if (isset($_GET['ordenar']) && $_GET['ordem']) {
                  $sql_ordenar = ' ORDER BY ' . $_GET['ordenar'] . ' ' . $_GET['ordem'];
                } else {
                  $sql_ordenar = ' ORDER BY id DESC';
                }

                // lista os registros de uma tabela
                /* $sql = 'SELECT secoes.nome AS secao, categorias.nome AS categoria, subcategorias.nome AS subcategoria, subcategorias.id, subcategorias.inativo, subcategorias.titulo, subcategorias.subtitulo FROM secoes, categorias, subcategorias WHERE secoes.id = categorias.secao_id AND categorias.id = subcategorias.categoria_id' . $sql_buscar . $sql_ordenar;

                // lista os registros de uma tabela
                $url = './?area=subcategorias&busca=' . $_GET['busca'];
                include('inc.pre-paginacao.php');
                echo '<p  class="alert alert-info" role="alert"><strong>' . $tr . ' projetos encontrados</strong></p>';
                include('inc.paginacao.php');

                $res = mysql_query($sql);
                $num = mysql_num_rows($res);
                for ($i = 0; $i < $num; $i++) {
                  $id = mysql_result($res, $i, 'id');
                  $inativo = mysql_result($res, $i, 'inativo');
                  $secao = mysql_result($res, $i, 'secao');
                  $categoria = mysql_result($res, $i, 'categoria');
                  $subcategoria = mysql_result($res, $i, 'subcategoria');
                  $titulo = mysql_result($res, $i, 'titulo');
                  $subtitulo = mysql_result($res, $i, 'subtitulo');

                  // formata a data no padrao Brasileiro
                  $data_expira = explode('-', $data_expira);
                  $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0]; */

              ?>
              @foreach($projeto->subcategorias as $foto)
                <tr align="center">
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
                    <!-- <img width="100" class="img-thumbnail" src="{{asset('imagens/subcategorias/projeto-foto-'.$foto->id.'.jpg')}}"> -->
                    @if (file_exists(public_path('uploads/projeto-foto-'.$foto->id.'-thumbs.jpg')))
                      <img width="100" class="img-thumbnail" src="{{asset('uploads/projeto-foto-'.$foto->id.'-thumbs.jpg')}}">
                    @endif
                  </td>
                  
                  <td><?php //echo $foto->categoria 
                      ?></td>
                  <td><?php //echo $foto->subcategoria 
                      ?></td>
                  <!--
                    <td align="left"><?php //echo $foto->titulo 
                                      ?></td>
                    <td align="left"><?php //echo $foto->subtitulo 
                                      ?></td>
                  -->
                  <td style="width:0; white-space:nowrap;">                    
                    <a class="btn btn-sm btn-primary" href="{{route('fotos', ['projeto' => $projeto->id, 'foto' => $foto->id])}}" onClick="return confirmLink(this, 'excluir este item?')">
                      Editar
                    </a>
                    <form method="post" action="{{route('fotos.excluir', ['projeto' => $projeto->id, 'foto' => $foto->id])}}" style="display:inline-block;">
                      @csrf
                      @method("delete")
                      <button type="submit" class="btn btn-sm btn-danger" onClick="return confirmLink(this, 'excluir este item?')">
                        Excluir
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              <?php
              //}
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection