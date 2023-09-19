@extends("admin.layout")
@section("head")
  <title>Postagens - Admin</title>
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
  <script src="{{asset('assets/js/upload-image.js')}}"></script>
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
        <div class="col-md-5 {{$postagem??'hidden'}}">
          <h3>Cadastro de Postagem</h3>
          <p>&nbsp;</p>
          <?php
          //if ($_POST) {
  
            // formata a data no padróo mysql data_expira = \''.date('Y-m-d').'\',
            /* $data_expira = explode('/', $_POST['data_expira']);
            $data_expira = $data_expira[2] . '-' . $data_expira[1] . '-' . $data_expira[0]; */
  
            // altera no banco 
            /* if ($_POST['editar'] != '') {
              $sql = 'UPDATE postagens SET 
                data_expira = \'' . date('Y-m-d') . '\',
                inativo = \'' . $_POST['inativo'] . '\', 
                destaque = \'' . $_POST['destaque'] . '\', 
                etiqueta_id = \'' . $_POST['etiqueta'] . '\', 
                secao_id = \'' . $_POST['secao'] . '\',
                categoria_id = \'' . $_POST['categoria'] . '\',
                subcategoria_id = \'' . $_POST['subcategoria'] . '\',
                nome = \'' . $_POST['nome'] . '\', 
                imagem = \'' . $_POST['imagem'] . '\', 
                titulo = \'' . $_POST['titulo'] . '\', 
                subtitulo = \'' . $_POST['subtitulo'] . '\', 
                detalhe = \'' . $_POST['detalhe'] . '\', 
                descricao = \'' . $_POST['descricao'] . '\', 
                link = \'' . $_POST['link'] . '\', 
                fonte = \'' . $_POST['fonte'] . '\', 
                alinhamento = \'' . $_POST['alinhamento'] . '\', 
                container = \'' . $_POST['container'] . '\',
                borda = \'' . $_POST['borda'] . '\',
                arredondado = \'' . $_POST['arredondado'] . '\',
                sombra = \'' . $_POST['sombra'] . '\',
                background = \'' . $_POST['background'] . '\',
                opiniao = \'' . $_POST['opiniao'] . '\',
                views = \'' . $_POST['views'] . '\'
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
              $sql = 'INSERT INTO postagens SET 
                data_expira = \'' . date('Y-m-d') . '\',
                inativo = \'' . $_POST['inativo'] . '\', 
                destaque = \'' . $_POST['destaque'] . '\', 
                etiqueta_id = \'' . $_POST['etiqueta'] . '\', 
                secao_id = \'' . $_POST['secao'] . '\',
                categoria_id = \'' . $_POST['categoria'] . '\',
                subcategoria_id = \'' . $_POST['subcategoria'] . '\',
                nome = \'' . $_POST['nome'] . '\', 
                imagem = \'' . $_POST['imagem'] . '\', 
                titulo = \'' . $_POST['titulo'] . '\', 
                subtitulo = \'' . $_POST['subtitulo'] . '\', 
                detalhe = \'' . $_POST['detalhe'] . '\', 
                descricao = \'' . $_POST['descricao'] . '\', 
                link = \'' . $_POST['link'] . '\',
                fonte = \'' . $_POST['fonte'] . '\',
                alinhamento = \'' . $_POST['alinhamento'] . '\',
                container = \'' . $_POST['container'] . '\',
                borda = \'' . $_POST['borda'] . '\',
                arredondado = \'' . $_POST['arredondado'] . '\',
                sombra = \'' . $_POST['sombra'] . '\',
                background = \'' . $_POST['background'] . '\',
                opiniao = \'' . $_POST['opiniao'] . '\',
                views = \'' . $_POST['views'] . '\',
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
            for ($x = 1; $x <= 4; $x++) {
              if (is_uploaded_file($_FILES['foto' . $x]['tmp_name'])) {
                move_uploaded_file($_FILES['foto' . $x]['tmp_name'], '../imagens/postagens/' . $id . '.' . $x . '.jpg');
                copy('../imagens/postagens/' . $id . '.' . $x . '.jpg', '../imagens/postagens/thumbs/' . $id . '.' . $x . '.jpg');
                copy('../imagens/postagens/' . $id . '.' . $x . '.jpg', '../imagens/postagens/grande/' . $id . '.' . $x . '.jpg');
                arruma_foto('../imagens/postagens/' . $id . '.' . $x . '.jpg', 800);
                arruma_foto('../imagens/postagens/thumbs/' . $id . '.' . $x . '.jpg', 400);
                arruma_foto('../imagens/postagens/grande/' . $id . '.' . $x . '.jpg', 1600);
              }
            }
          }
  
          // Exclui do banco
          if (isset($_GET['excluir'])) {
            $sql = 'DELETE FROM postagens WHERE id = \'' . $_GET['excluir'] . '\'';
            $res = mysql_query($sql);
  
            // Edita a imagem
            if (is_file('../imagens/postagens/' . $_GET['editar'] . '.' . $x . '.jpg')) {
              unlink('../imagens/postagens/' . $_GET['editar'] . '.' . $x . '.jpg');
              unlink('../imagens/postagens/grande/' . $_GET['editar'] . '.' . $x . '.jpg');
              unlink('../imagens/postagens/thumbs/' . $_GET['editar'] . '.' . $x . '.jpg');
            }
  
            ?>
            <p class="alert alert-danger" role="alert">Postagem escluída com sucesso!
              <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
            </p>
          <?php
          }
  
          // Altera o inativo
          if (isset($_GET['inativo']) && $_GET['inativo'] != '') {
            $sql = 'UPDATE postagens SET inativo = \'' . $_GET['inativo'] . '\' WHERE id = \'' . $_GET['id'] . '\'';
            $res = mysql_query($sql);
          }
  
          // Carrega os dados para edição
          if (isset($_GET['editar'])) {
            $sql = 'SELECT * FROM postagens WHERE id = \'' . $_GET['editar'] . '\'';
            $res = mysql_query($sql);
            $num = mysql_num_rows($res);
            for ($i = 0; $i < $num; $i++) {
              $data_expira = mysql_result($res, $i, 'data_expira');
              $inativo = mysql_result($res, $i, 'inativo');
              $destaque = mysql_result($res, $i, 'destaque');
              $etiqueta_id = mysql_result($res, $i, 'etiqueta_id');
              $secao_id = mysql_result($res, $i, 'secao_id');
              $categoria_id = mysql_result($res, $i, 'categoria_id');
              $subcategoria_id = mysql_result($res, $i, 'subcategoria_id');
              $nome = mysql_result($res, $i, 'nome');
              $titulo = mysql_result($res, $i, 'titulo');
              $subtitulo = mysql_result($res, $i, 'subtitulo');
              $detalhe = mysql_result($res, $i, 'detalhe');
              $descricao = mysql_result($res, $i, 'descricao');
              $link = mysql_result($res, $i, 'link');
              $fonte = mysql_result($res, $i, 'fonte');
              $alinhamento = mysql_result($res, $i, 'alinhamento');
              $container = mysql_result($res, $i, 'container');
              $borda = mysql_result($res, $i, 'borda');
              $arredondado = mysql_result($res, $i, 'arredondado');
              $sombra = mysql_result($res, $i, 'sombra');
              $background = mysql_result($res, $i, 'background');
              $opiniao = mysql_result($res, $i, 'opiniao');
              $views = mysql_result($res, $i, 'views');
  
              // Formata a data no padrao Brasileiro
              $data_expira = explode('-', $data_expira);
              $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0];
            }
          }
  
          // Exclui a foto
          if (isset($_GET['remover_foto'])) {
            if (is_file('../imagens/postagens/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg')) {
              unlink('../imagens/postagens/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/postagens/grande/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/postagens/thumbs/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
            }
          } */
  
          ?>
          <form action="./?area=postagens" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <fieldset>
  
              <!--   
              Text input data expira 
                  <div class="form-group">
            <label>Data Expira</label>
                      <input type="date" id="data_expira" name="data_expira" placeholder="Data Expira: Ex: 02/01/2016" class="form-control" value="<?php //if ($data_expira != '00/00/0000') {
                                                                                                                                                      //echo $data_expira;
                                                                                                                                                    //} ?>">
                  </div>
          -->
  
              <div class="row">
  
                <!-- Multiple Checkboxes (inline) Destaque 
                <div align="left" class="form-group col-md-6">
                  <label class="control-label" for="destaque">Destaque:</label>
                  <label class="checkbox-inline" for="destaque-0">
                    <input type="checkbox" id="destaque-0"  name="destaque"value="1" <?php //if ($destaque == 1) { ?>checked="checked"<?php //} ?> >
                    SIM </label>
                </div>
               -->
                <!-- Multiple Checkboxes (inline) container 
                <div align="left" class="form-group col-md-6">
                  <label class="control-label" for="container">Container:</label>
                  <label class="checkbox-inline" for="container-0">
                    <input type="checkbox" id="container-0"  name="container"value="1" <?php //if ($container == 1) { ?>checked="checked"<?php //} ?> >
                    SIM </label>
                </div>
                -->
                <!-- Multiple Checkboxes (inline) Borda 
                <div align="left" class="form-group col-md-6">
                  <label class="control-label" for="borda">Borda:</label>
                  <label class="checkbox-inline" for="borda-0">
                    <input type="checkbox" id="borda-0"  name="borda"value="1" <?php //if ($borda == 1) { ?>checked="checked"<?php //} ?> >
                    SIM </label>
                </div>
                -->
                <!-- Multiple Checkboxes (inline) Arredondado 
                <div align="left" class="form-group col-md-6">
                  <label class="control-label" for="arredondado">Arredondado:</label>
                  <label class="checkbox-inline" for="arredondado-0">
                    <input type="checkbox" id="arredondado-0"  name="arredondado"value="1" <?php //if ($arredondado == 1) { ?>checked="checked"<?php //} ?> >
                    SIM </label>
                </div>
                -->
                <!-- Multiple Checkboxes (inline) Sombra 
                <div align="left" class="form-group col-md-6">
                  <label class="control-label" for="sombra">Sombra:</label>
                  <label class="checkbox-inline" for="sombra-0">
                    <input type="checkbox" id="sombra-0"  name="sombra"value="1" <?php //if ($sombra == 1) { ?>checked="checked"<?php //} ?> >
                    SIM </label>
                </div>
                -->
                <!-- Multiple Checkboxes (inline) background 
                <div class="form-group col-md-6">
                  <label>Cor de Fundo</label>
                  <input type="text" id="background" name="background" placeholder="Background" class="form-control" value="<?php //echo $background ?>">
                </div>
              -->
                <!-- Select Alinhamento
              <div class="form-group col-md-6">
                <label>Alinhamento</label>
                <select name="alinhamento" id="alinhamento" class="form-control">
                  <option><?php //echo $alinhamento ?>
                  <option value="Center">Center</option>
                  <option value="Left">Left</option>
                  <option value="Right">Right</option>
                </select>
                </div>
               -->
                <!-- Select Etiqueta 
              <div class="form-group col-md-6">
                <label>Etiqueta</label>
                <select name="etiqueta" id="etiqueta" class="form-control">
                  <option>
                  <?php
                  /* $sql = 'SELECT * FROM etiquetas ORDER BY id';
                  $res = mysql_query($sql);
                  $num = mysql_num_rows($res);
                  for ($i = 0; $i < $num; $i++) {
                    $id = mysql_result($res, $i, 'id');
                    $etiqueta = mysql_result($res, $i, 'nome');
                  ?>
                  <option value="<?php echo $id ?>" <?php if ($id == $etiqueta_id) { ?>selected="selected"<?php } ?>><?php echo $etiqueta ?></option>
                  <?php
                  } */
                  ?>
                </select>
                </div>
  -->
                <!-- File Button Parallax 
                <div class="form-group col-md-12"> 
            <label>Imagem de Fundo</label>
              <img width="70" class="img-thumbnail" src="../imagens/postagens/thumbs/<?php //echo $_GET['editar'] ?>.jpg?<?php echo rand() ?>" alt="<?php //echo $titulo ?>" title="<?php //echo $titulo ?>">
              <input type="file" id="parallax" name="parallax" value="<?php //echo $parallax ?>"class="input-file">
            </div>
            -->
                
              <!--
                maintenance mode
                <div class="form-group col-md-6">
                    <label>Imagem</label><br>
                    @if($postagem)
                      <x-upload-image fallback="{{asset('/admin/assets/img/padrao.jpg')}}" path="uploads/postagem-{{Str::slug($postagem->nome)}}.jpg" name="imagem"/>
                    @endif
                  </div>
                </div>
              -->

                <!-- Multiple Checkboxes (inline) Inativo
                  <div align="left" class="form-group col-md-6">
                    <label class="control-label" for="inativo">Inativo:</label>
                    <label class="checkbox-inline" for="inativo-0">
                      <input type="checkbox" id="inativo-0"  name="inativo"value="1" <?php //if ($inativo == 1) { ?>checked="checked"<?php //} ?> >
                      SIM </label>
                  </div>
                -->
                <!-- imagens -->
                <!-- File Button Imagem 
                  <div class="form-group">
                    <label>Imagem</label>
                    <img width="70" class="img-thumbnail" src="../imagens/postagens/thumbs/<?php //echo $_GET['editar'] ?>.jpg?<?php echo rand() ?>" alt="<?php //echo $titulo ?>" title="<?php //echo $titulo ?>">
                    <input type="file" id="imagem" name="imagem" value="<?php //echo $titulo ?>"class="input-file">
                  </div>
                -->
                <!-- Select Secao -->
                <div class="form-group col-md-12">
                  <label>Escolha a SEÇÃO da postagem*</label>
                  <select required name="secao" id="secao" class="form-control">
                    <option><?php //echo $secao; ?>
                      <?php
                      // $sql = 'SELECT * FROM secoes ORDER BY nome ASC LIMIT 6 OFFSET 5';
                      /* $sql = 'SELECT * FROM secoes WHERE inativo = \'0\' AND destaque = \'0\' ORDER BY id';
                      $res = mysql_query($sql);
                      $num = mysql_num_rows($res);
                      for ($i = 0; $i < $num; $i++) {
                        $id = mysql_result($res, $i, 'id');
                        $secao = mysql_result($res, $i, 'nome'); */
                      ?>
                    <option value="<?php //echo $id ?>" <?php //if ($id == $secao_id) { ?>selected="selected" <?php //} ?>><?php //echo $secao ?></option>
                  <?php
                      //}
                  ?>
                  </select>
                  <!--
                    <span class="selectRequiredMsg">Selecione um item ou</span><a href="./?area=secoes" data-target="#secoes"> Cadastre nova seção</a> ]
                  -->
                </div>
  
                <!-- Select categoria 
              <div class="form-group">
            <label>Escolha a CATEGORIA da postagem*</label>
            <select required name="categoria" id="categoria" class="form-control">
              <option><?php //echo $categoria; ?>
              <?php
              // $sql = 'SELECT * FROM categorias ORDER BY nome ASC LIMIT 6 OFFSET 5';
              /* $sql = 'SELECT * FROM categorias ORDER BY id';
              $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for ($i = 0; $i < $num; $i++) {
                $id = mysql_result($res, $i, 'id');
                $categoria = mysql_result($res, $i, 'nome'); */
              ?>
              <option value="<?php //echo $id ?>" <?php //if ($id == $categoria_id) { ?>selected="selected"<?php //} ?>><?php //echo $categoria ?></option>
              <?php
              //}
              ?>
            </select>
                      <span class="selectRequiredMsg">Selecione um item ou</span><a href="./?area=categorias" data-target="#categorias"> Cadastre nova categoria</a>
                  </div>
            -->
                <!-- Select subcategoria 
              <div class="form-group">
            <label>Escolha a SUBCATEGORIA da postagem*</label>
            <select required name="subcategoria" id="subcategoria" class="form-control">
              <option><?php //echo $subcategoria; ?>
              <?php
              // $sql = 'SELECT * FROM subcategorias ORDER BY nome ASC LIMIT 6 OFFSET 5';
              /* $sql = 'SELECT * FROM subcategorias ORDER BY id';
              $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for ($i = 0; $i < $num; $i++) {
                $id = mysql_result($res, $i, 'id');
                $subcategoria = mysql_result($res, $i, 'nome'); */
              ?>
              <option value="<?php //echo $id ?>" <?php //if ($id == $subcategoria_id) { ?>selected="selected"<?php //} ?>><?php //echo $subcategoria ?></option>
              <?php
              //}
              ?>
            </select>
                      <span class="selectRequiredMsg">Selecione um item ou</span><a href="./?area=subcategorias" data-target="#categorias"> Cadastre nova subcategoria</a>
                  </div>
             -->
                <!-- Text input Nome  -->
                <div class="form-group col-md-12">
                  <label>Postagem*</label>
                  <input required type="text" id="nome" name="nome" placeholder="Nome*" class="form-control" value="<?php echo $postagem->nome??'' ?>">
                </div>
  
                <!-- Text input Titulo-->
                <div class="form-group col-md-12">
                  <label>Titulo</label>
                  <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="<?php echo $postagem->titulo??'' ?>">
                </div>
  
                <!-- Text input SubTitulo-->
                <div class="form-group col-md-12">
                  <label>Subtitulo</label>
                  <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="<?php echo $postagem->subtitulo??'' ?>">
                </div>
  
                <!-- Text input Descrição-->
                <div class="form-group col-md-12">
                  <label>Descrição</label>
                  <textarea id="descricao" name="descricao" rows="3" class="form-control"><?php echo $postagem->descricao??'' ?></textarea>
                </div>
  
                <!-- Text input Link-->
                <div class="form-group col-md-12">
                  <label>Link</label>
                  <input type="text" id="link" name="link" placeholder="Link" class="form-control" value="<?php echo $postagem->link??'' ?>">
                </div>
  
                <!-- Text input Fonte
              <div class="form-group col-md-12">
                <label>Fonte</label>
                <input type="text" id="fonte" name="fonte" placeholder="Fonte" class="form-control" value="<?php //echo $fonte ?>">
              </div>
              -->
                <!-- File Button Enviar -->
                <div class="form-group col-md-12">
                  <label class="control-label" for="filebutton"></label>
                  <input type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" value="Cadastrar">
                  <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php //echo $_GET['editar'] ?>">
                </div>
  
            </fieldset>
          </form>
          <p>&nbsp;</p>
        </div>
        <!-- /col-md-5 -->
  
        <div class="{{$postagem?'col-md-7':'col-md-12'}}">
          <h3>Postagens da {{$secao->nome}}</h3>
          <p>&nbsp;</p>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive">
              <tr align="center">
                <td><strong><a href="./?area=postagens&ordenar=id&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                          echo 'ASC';
                                                                        } else {
                                                                          echo 'DESC';
                                                                        } */ ?>">ID</a></strong></td>
                <td><strong><a href="./?area=postagens&ordenar=postagens.inativo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                          echo 'ASC';
                                                                                        } else {
                                                                                          echo 'DESC';
                                                                                        } */ ?>">Ativo</a></strong></td>
                
                <td><strong><a href="./?area=postagens&ordenar=id&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                          echo 'ASC';
                                                                        } else {
                                                                          echo 'DESC';
                                                                        } */ ?>">Imagem</a></strong></td>
                
                <td align="left"><strong><a href="./?area=postagens&ordenar=nome&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                          echo 'ASC';
                                                                                        } else {
                                                                                          echo 'DESC';
                                                                                        } */ ?>">Postagem</a></strong></td>
                <td align="left"><strong><a href="./?area=postagens&ordenar=titulo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                            echo 'ASC';
                                                                                          } else {
                                                                                            echo 'DESC';
                                                                                          } */ ?>">Título</a></strong></td>
                <td align="left"><strong><a href="./?area=postagens&ordenar=subtitulo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                              echo 'ASC';
                                                                                            } else {
                                                                                              echo 'DESC';
                                                                                            } */ ?>">Subtítulo</a></strong></td>
                                                                                            <td></td>
              </tr>
              <?php
  
              // Define a ordem
              /* if ($_GET['ordenar'] && $_GET['ordem']) {
                $sql_ordenar = ' ORDER BY ' . $_GET['ordenar'] . ' ' . $_GET['ordem'];
              } else {
                $sql_ordenar = ' ORDER BY id DESC';
              } */
  
              // lista as postagens encontradas e paginação
              //$sql = 'SELECT postagens.id, postagens.inativo, postagens.nome, postagens.titulo, postagens.subtitulo, postagens.secao_id AS postagem, secoes.nome AS secao FROM postagens, secoes WHERE postagens.secao_id = secoes.id' . $sql_buscar . $sql_ordenar;
  
              // lista os registros de uma tabela
              /* $url = 'postagens.php&busca=' . $_GET['busca'];
              include('inc.pre-paginacao.php');
              echo '<p class="alert alert-info" role="alert"><strong>' . $tr . ' postagens encontradas</strong></p>';
              include('inc.paginacao.php'); */
  
              // Lista as postagens
              /* $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for ($i = 0; $i < $num; $i++) {
                $id = mysql_result($res, $i, 'id');
                $inativo = mysql_result($res, $i, 'inativo');
                $secao = mysql_result($res, $i, 'secao');
                $nome = mysql_result($res, $i, 'nome');
                $titulo = mysql_result($res, $i, 'titulo');
                $subtitulo = mysql_result($res, $i, 'subtitulo'); */
  
                // formata a data no padrao Brasileiro
                /* $data_expira = explode('-', $data_expira);
                $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0]; */
  
              ?>
              @foreach($secao->postagens as $postagem)
                <tr align="center">
                  <td style="width:0; white-space:nowrap;"><?php echo $postagem->id ?></td>
                  <td style="width:0; white-space:nowrap;">
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
                  <td style="width:0; white-space:nowrap;">
                    <img width="100" class="img-thumbnail" src="{{asset('imagens/postagens/thumbs/'.$postagem->id.'.1.jpg')}}">
                  </td>
                  
                  <td align="left"><?php echo $postagem->nome ?></td>
                  <td align="left"><?php echo $postagem->titulo ?></td>
                  <td align="left"><?php echo $postagem->subtitulo ?></td>
                  <td style="width:0; white-space:nowrap;">
                    <a class="btn btn-sm btn-primary" href="{{route('postagens.editar', ['secao' => $secao->id, 'postagem' => $postagem->id])}}" onClick="return confirmLink(this, 'excluir este item?')">
                      Editar
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{route('postagens.editar', ['secao' => $secao->id, 'postagem' => $postagem->id])}}" onClick="return confirmLink(this, 'excluir este item?')">
                      Excluir
                    </a>
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