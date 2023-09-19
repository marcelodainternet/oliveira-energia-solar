@extends("admin.layout")

@section("head")
    <title>Seções - Admin</title>
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
      <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | SEÇÕES</h2>
      <h4 class="panel-default text-info">Veja e edite as SEÇÕES do site! </h4>
    </div>
  </div>
  <br />
  <div class="page-content">
    <div class="page-container">
      <div class="row">
        <div class="col-md-5 {{$secao?'visible':'hidden'}}">
          <h3>Editar Seção</h3>
          <form action="./?area=secoes" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="row">
              <div class="form-group col-md-12">
                <label>Imagem</label><br>
                @if($secao && file_exists(public_path('/imagens/secoes/'.$secao->id.'.1.jpg')))
                  <div style="position: relative; display:inline-block;">
                    <label for="foto1">
                      <img class="img-thumbnail" style="width: 225px; height: 150px; object-fit:contain;" src="{{asset('/imagens/secoes/'.$secao->id.'.1.jpg')}}" alt="1" title="1">
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
                <input class="form-control input hidden" style="vertical-align:middle;" name="foto1" type="file" id="foto1" />
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
                <input type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" value="Cadastrar">
                <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php echo $_GET['editar'] ?? ''; ?>">
              </div>
            </div>
        </form>
          <?php
          /* if ($_POST) {
  
            // formata a data no padrão mysql
            $data_expira = explode('/', $_POST['data_expira']);
            $data_expira = $data_expira[2] . '-' . $data_expira[1] . '-' . $data_expira[0];
  
            // altera no banco nome = \''.$_POST['nome'].'\', 
  
            if ($_POST['editar'] != '') {
              $sql = "UPDATE secoes SET 
                data_expira = '.date('Y-m-d').',
                ordem = '{$_POST['ordem']}', 
                inativo = '{$_POST['inativo']}', 
                imagem = '{$_POST['imagem']}', 
                titulo = '{$_POST['titulo']}', 
                subtitulo = '{$_POST['subtitulo']}', 
                descricao = '{$_POST['descricao']}', 
                alinhamento = '{$_POST['alinhamento']}',
                container = '{$_POST['container']}',
                borda = '{$_POST['borda']}',
                arredondado = '{$_POST['arredondado']}',
                sombra = '{$_POST['sombra']}',
                background_color = '{$_POST['background_color']}',
                background_img = '{$_POST['background_img']}',
                parallax = '{$_POST['parallax']}'
                WHERE id = '{$_POST['editar']}'";
              $res = $db->query($sql);
              $id = $_POST['editar'];
          ?>
              <p class="alert alert-success" role="alert">Seção alterada com sucesso!
                <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
              </p>
            <?php
             } else {
              $dataAtual = date("Y-m-d");
              $datahoraAtual = date("Y-m-d H:i");
              $query = "INSERT INTO secoes SET 
              data_expira = '{$dataAtual}',
              ordem = '{$_POST["ordem"]}', 
              inativo = ' {$_POST["inativo"]}', 
              imagem = ' {$_POST["imagem"]}', 
              nome = ' {$_POST["nome"]}', 
              titulo = ' {$_POST["titulo"]}', 
              subtitulo = ' {$_POST["subtitulo"]}', 
              descricao = ' {$_POST["descricao"]}', 
              alinhamento = ' {$_POST["alinhamento"]}',
              container = ' {$_POST["container"]}',
              borda = ' {$_POST["borda"]}',
              arredondado = '{$_POST["arredondado"]}',
              sombra = '{$_POST["sombra"]}',
              background_color = '{$_POST["background_color"]}',
              background_img = '{$_POST["background_img"]}',
              parallax = ' {$_POST["parallax"]}',
              data_cadastro = '{$datahoraAtual}'";
              $db->query($query);
              $id = $db->insert_id();
            ?>
              <p class="alert alert-success" role="alert">Seção cadastrada com sucesso!
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
            for ($x = 1; $x <= 2; $x++) {
              if (is_uploaded_file($_FILES['foto' . $x]['tmp_name'])) {
                move_uploaded_file($_FILES['foto' . $x]['tmp_name'], '../imagens/secoes/' . $id . '.' . $x . '.jpg');
                copy('../imagens/secoes/' . $id . '.' . $x . '.jpg', '../imagens/secoes/thumbs/' . $id . '.' . $x . '.jpg');
                copy('../imagens/secoes/' . $id . '.' . $x . '.jpg', '../imagens/secoes/grande/' . $id . '.' . $x . '.jpg');
                arruma_foto('../imagens/secoes/' . $id . '.' . $x . '.jpg', 800);
                arruma_foto('../imagens/secoes/thumbs/' . $id . '.' . $x . '.jpg', 400);
                arruma_foto('../imagens/secoes/grande/' . $id . '.' . $x . '.jpg', 1600);
              }
            }
          } */
  
          // Exclui do banco
          /* if (isset($_GET['excluir'])) {
            $sql = "DELETE FROM secoes WHERE id = '{$_GET["excluir"]}'";
            $res = $db->query($sql); */
  
            // Edita a imagem
            /* if (is_file('../imagens/secoes/' . $_GET['editar'] . '.' . $x . '.jpg')) {
              unlink('../imagens/secoes/' . $_GET['editar'] . '.' . $x . '.jpg');
              unlink('../imagens/secoes/grande/' . $_GET['editar'] . '.' . $x . '.jpg');
              unlink('../imagens/secoes/thumbs/' . $_GET['editar'] . '.' . $x . '.jpg');
            }
  
            ?>
            <p class="alert alert-danger" role="alert">Seção escluída com sucesso!
              <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
            </p>
          <?php
          //}
  
          // Altera o inativo
          if (isset($_GET['inativo'])) {
            $sql = "UPDATE secoes SET inativo = '{$_GET["inativo"]}' WHERE id = '{$_GET["id"]}'";
            $res = $db->query($sql);
          } */
  
          // Carrega os dados para edição
          /* if (isset($_GET['editar'])) {
            $query = "SELECT * FROM secoes WHERE id = '{$_GET["editar"]}'";
            $resultado = $db->query($query);
            $secoes = $resultado->fetch_all(MYSQLI_BOTH);
            foreach ($secoes as $secao) {
              $data_expira = $secoes["data_expira"];
              $ordem = $secoes["ordem"];
              $inativo = $secoes["inativo"];
              $imagem = $secoes["imagem"];
              $nome = $secoes["nome"];
              $titulo = $secoes["titulo"];
              $subtitulo = $secoes["subtitulo"];
              $descricao = $secoes["descricao"];
              $alinhamento = $secoes["alinhamento"];
              $container = $secoes["container"];
              $borda = $secoes["borda"];
              $arredondado = $secoes["arredondado"];
              $sombra = $secoes["sombra"];
              $background_color = $secoes["background_color"];
              $background_img = $secoes["background_img"];
              $parallax = $secoes["parallax"];
  
              // Formata a data no padrao Brasileiro
              $data_expira = explode('-', $data_expira);
              $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0];
            }
          } */
  
          // Exclui a foto
          /* if (isset($_GET['remover_foto'])) {
            if (is_file('../imagens/secoes/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg')) {
              unlink('../imagens/secoes/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/secoes/grande/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
              unlink('../imagens/secoes/thumbs/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
            }
          } */
  
          ?>
          
        </div>
        <!-- /col-md-5 -->
  
        <div class="{{$secao?'col-md-7':'col-md-12'}}">
          <h3>Seções cadastradas</h3>
          <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive">
              <tr align="center">
                <!--
             <td><strong><a href="./?area=secoes&ordenar=id&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                    echo 'ASC';
                                                                  } else {
                                                                    echo 'DESC';
                                                                  }*/ ?>">ID</a></strong></td>
             <td><strong><a href="./?area=secoes&ordenar=secoes.inativo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                echo 'ASC';
                                                                              } else {
                                                                                echo 'DESC';
                                                                              } */ ?>">Ativo</a></strong></td>
              <td><strong><a>Excluir</a></strong></td>
          -->
                
                <td><strong><a href="./?area=secoes&ordenar=id&ordem=<?php /* if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                        echo 'ASC';
                                                                      } else {
                                                                        echo 'DESC';
                                                                      } */ ?>">Imagem</a></strong></td>
                <td align="left"><strong><a href="./?area=secoes&ordenar=nome&ordem=<?php /* if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                      echo 'ASC';
                                                                                    } else {
                                                                                      echo 'DESC';
                                                                                    } */ ?>">Seção</a></strong></td>
                <td align="left"><strong><a href="./?area=secoes&ordenar=titulo&ordem=<?php /* if (isset($_GET['ordem']) && $_GET['ordem'] == 'DESC') {
                                                                                        echo 'ASC';
                                                                                      } else {
                                                                                        echo 'DESC';
                                                                                      } */ ?>">Título</a></strong></td>
            <td><strong><a></a></strong></td>  
            </tr>
              <?php
  
              // Define a ordem
              /* if (isset($_GET['ordenar']) && $_GET['ordem']) {
                $sql_ordenar = ' ORDER BY ' . $_GET['ordenar'] . ' ' . $_GET['ordem'];
              } else {
                $sql_ordenar = ' ORDER BY id ASC';
              } */
  
              // lista as secoes encontradas e paginação
              /* $sql_buscar = $sql_buscar ?? '';
              $sql = "SELECT * FROM secoes WHERE inativo = 0 {$sql_buscar} {$sql_ordenar}";
  
              $busca = $_GET['busca'] ?? ''; */
              // lista os registros de uma tabela
              /* $url = './?area=secoes&busca=' . $busca;
              include('inc.pre-paginacao.php');
              echo '<p class="alert alert-info" role="alert"><strong>' . $tr . ' seções encontradas</strong></p>';
              include('inc.paginacao.php'); */
  
              // Lista as secoes
              /* $resultado = $db->query($sql);
              $secoes = $resultado->result->fetch_all(MYSQLI_BOTH);
  
              foreach ($secoes as $secao) {
                $id = $secao["id"];
                $inativo = $secao["inativo"];
                $nome = $secao["nome"];
                $titulo = $secao["titulo"];
                $subtitulo = $secao["subtitulo"];
                $data_expira = $secao["data_expira"];
  
                // formata a data no padrao Brasileiro
                $data_expira = explode('-', $data_expira);
                $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0]; */
  
              ?>
              @foreach($secoes as $secao)
                <tr style="text-align:center;">
                  <td style="width:0; vertical-align:middle;">
                    @if (file_exists(public_path('imagens/secoes/thumbs/'.$secao->id.'.1.jpg')))
                      <img style="width: 75px; height: 50px; object-fit: cover; max-width: none;" class="img-thumbnail" src="{{asset('imagens/secoes/thumbs/'.$secao->id.'.1.jpg')}}">
                    @endif
                  </td>
                  <td style="vertical-align:middle; text-align:left;">{{$secao->nome}}</td>
                  <td style="vertical-align:middle; text-align:left;">{{$secao->titulo}}</td>
                  <td style="width:0; vertical-align:middle; white-space:nowrap;">
                    <a class="btn btn-sm btn-primary" href="{{route('secoes.editar', $secao->id)}}">
                      Editar
                    </a>
                    <a class="btn btn-sm btn-primary" href="{{route('postagens.editar', $secao->id)}}">
                      Ver Postagens ({{$secao->postagens->count()}})
                    </a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
          <?php
          //include('inc.paginacao.php');
          ?>
        </div>
      </div>
    </div>
  </div>
@endsection