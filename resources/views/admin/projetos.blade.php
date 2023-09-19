@extends("admin.layout")
@section("head")
    <title>Projetos - Admin</title>
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
                    <h3>Cadastro de Projeto no PORTFÓLIO</h3>
                    <?php
                        /* if ($_POST) {
                
                            // formata a data no padrão mysql
                            $data_expira = explode('/', $_POST['data_expira']);
                            $data_expira = $data_expira[2] . '-' . $data_expira[1] . '-' . $data_expira[0];
                
                            // altera no banco // secao_id = \''.$_POST['secao'].'\',
                            if ($_POST['editar'] != '') {
                            $sql = 'UPDATE categorias SET 
                                data_expira = \'' . date('Y-m-d') . '\',
                                ordem = \'' . $_POST['ordem'] . '\', 
                                inativo = \'' . $_POST['inativo'] . '\', 
                                imagem = \'' . $_POST['imagem'] . '\', 
                                nome = \'' . $_POST['nome'] . '\', 
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
                            <p class="alert alert-success" role="alert">Projeto alterado com sucesso!
                                <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
                            </p>
                            <?php
                            } else {
                
                            // Insere no banco // secao_id = \''.$_POST['secao'].'\',
                            $sql = 'INSERT INTO categorias SET 
                                data_expira = \'' . date('Y-m-d') . '\',
                                ordem = \'' . $_POST['ordem'] . '\', 
                                inativo = \'' . $_POST['inativo'] . '\', 
                                imagem = \'' . $_POST['imagem'] . '\', 
                                secao_id = \'11\', 
                                nome = \'' . $_POST['nome'] . '\', 
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
                            <p class="alert alert-success" role="alert">Projeto cadastrado com sucesso!
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
                                move_uploaded_file($_FILES['foto' . $x]['tmp_name'], '../imagens/categorias/' . $id . '.' . $x . '.jpg');
                                copy('../imagens/categorias/' . $id . '.' . $x . '.jpg', '../imagens/categorias/thumbs/' . $id . '.' . $x . '.jpg');
                                copy('../imagens/categorias/' . $id . '.' . $x . '.jpg', '../imagens/categorias/grande/' . $id . '.' . $x . '.jpg');
                                arruma_foto('../imagens/categorias/' . $id . '.' . $x . '.jpg', 800);
                                arruma_foto('../imagens/categorias/thumbs/' . $id . '.' . $x . '.jpg', 400);
                                arruma_foto('../imagens/categorias/grande/' . $id . '.' . $x . '.jpg', 1600);
                            }
                            }
                        }
                
                        // Exclui do banco
                        if (isset($_GET['excluir'])) {
                            $sql = 'DELETE FROM categorias WHERE id = \'' . $_GET['excluir'] . '\'';
                            $res = mysql_query($sql);
                
                            // Edita a imagem
                            if (is_file('../imagens/categorias/' . $_GET['editar'] . '.' . $x . '.jpg')) {
                            unlink('../imagens/categorias/' . $_GET['editar'] . '.' . $x . '.jpg');
                            unlink('../imagens/categorias/grande/' . $_GET['editar'] . '.' . $x . '.jpg');
                            unlink('../imagens/categorias/thumbs/' . $_GET['editar'] . '.' . $x . '.jpg');
                            }
                
                            ?>
                            <p class="alert alert-danger" role="alert">Projeto escluído com sucesso!
                            <button type="button" class="close" data-dismiss="alert"> <i class="ace-icon fa fa-times"></i> </button>
                            </p>
                        <?php
                        //}
                
                        // Altera o inativo
                        if (isset($_GET['inativo']) && $_GET['inativo'] != '') {
                            $sql = 'UPDATE categorias SET inativo = \'' . $_GET['inativo'] . '\' WHERE id = \'' . $_GET['id'] . '\'';
                            $res = mysql_query($sql);
                        }
                
                        // Carrega os dados para edição
                        if (isset($_GET['editar'])) {
                            $sql = 'SELECT * FROM categorias WHERE id = \'' . $_GET['editar'] . '\'';
                            $res = mysql_query($sql);
                            $num = mysql_num_rows($res);
                            for ($i = 0; $i < $num; $i++) {
                            $data_expira = mysql_result($res, $i, 'data_expira');
                            $ordem = mysql_result($res, $i, 'ordem');
                            $inativo = mysql_result($res, $i, 'inativo');
                            $secao_id = mysql_result($res, $i, 'secao_id');
                            $imagem = mysql_result($res, $i, 'imagem');
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
                            $parallax = mysql_result($res, $i, 'parallax'); */
                
                            // Formata a data no padrao Brasileiro
                            /* $data_expira = explode('-', $data_expira);
                            $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0];
                            }
                        }
                
                        // Exclui a foto
                        if (isset($_GET['remover_foto'])) {
                            if (is_file('../imagens/categorias/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg')) {
                            unlink('../imagens/categorias/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
                            unlink('../imagens/categorias/grande/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
                            unlink('../imagens/categorias/thumbs/' . $_GET['editar'] . '.' . $_GET['remover_foto'] . '.jpg');
                            }
                        } */
                    ?>
                    <form action="./?area=categorias" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <fieldset>
                        <div class="row">
                            <!-- Text input ordem 
                                <div class="form-group col-md-3">
                                    <label>Ordem</label>
                                    <input type="text" id="ordem" name="ordem" placeholder="" class="form-control" value="<?php //echo $ordem ?>">
                                </div> 
                            -->
                            <!-- Text input data expira
                                <div class="form-group col-md-4">
                                    <label>Data Expira</label>
                                    <input type="text" id="data_expira" name="data_expira" placeholder="Data Expira: Ex: 02/01/2016" class="form-control" value="<?php /* if ($data_expira != '00/00/0000') {
                                                                                                                                                                    echo $data_expira;
                                                                                                                                                                    } */ ?>">
                                </div>
                            -->
                            <!-- Multiple Checkboxes (inline) container 
                                <div align="left" class="form-group col-md-3">
                                    <label class="control-label" for="container">Container:</label>
                                    <label class="checkbox-inline" for="container-0">
                                        <input type="checkbox" id="container-0"  name="container"value="1" <?php //if ($container == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->
                            <!-- Multiple Checkboxes (inline) Borda 
                                <div align="left" class="form-group col-md-3">
                                    <label class="control-label" for="borda">Borda:</label>
                                    <label class="checkbox-inline" for="borda-0">
                                        <input type="checkbox" id="borda-0"  name="borda"value="1" <?php //if ($borda == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->
                            <!-- Multiple Checkboxes (inline) Arredondado 
                                <div align="left" class="form-group col-md-4">
                                    <label class="control-label" for="arredondado">Arredondado:</label>
                                    <label class="checkbox-inline" for="arredondado-0">
                                        <input type="checkbox" id="arredondado-0"  name="arredondado"value="1" <?php //if ($arredondado == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->
                            <!-- Multiple Checkboxes (inline) Sombra 
                                <div align="left" class="form-group col-md-4">
                                    <label class="control-label" for="sombra">Sombra:</label>
                                    <label class="checkbox-inline" for="sombra-0">
                                        <input type="checkbox" id="sombra-0"  name="sombra"value="1" <?php //if ($sombra == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->

                            <!-- Multiple Checkboxes (inline) background
                                <div class="form-group col-md-4">
                                <label>Cor de Fundo</label>
                                <input type="text" id="background_color" name="background_color" placeholder="" class="form-control" value="<?php //echo $background_color ?>">
                                </div> 
                            -->
                            <!-- Select Alinhamento 
                                <div class="form-group col-md-4">
                                    <label>Alinhamento</label>
                                    <select name="alinhamento" id="alinhamento" class="form-control">
                                        <option><?php //echo $alinhamento ?>
                                        <option value="Center">Center</option>
                                        <option value="Left">Left</option>
                                        <option value="Right">Right</option>
                                    </select>
                                </div>
                            -->
                            <!-- Multiple Checkboxes (inline) Arredondado 
                                <div align="left" class="form-group col-md-2">
                                    <label class="control-label" for="parallax">Parallax:</label>
                                    <label class="checkbox-inline" for="parallax-0">
                                        <input type="checkbox" id="parallax-0"  name="parallax"value="1" <?php //if ($parallax == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->
            
                            <div class="form-group col-md-6">
                                <label>Imagem</label><br>

                                <img height="60" src="../imagens/categorias/{$projeto->id}.1.jpg" alt="" title="">
                                <a href="./?area=categorias&editar=<?php echo $_GET['editar'] ?? ''; ?>&remover_foto=1"><img src="assets/img/excluir.jpg" width="30" height="30" title="Excluir" alt="Excluir"></a>
                                
                                <input class="form-control input hidden" name="foto1" type="file" id="foto1"/>
                            </div>

                            <!-- Multiple Checkboxes (inline) Inativo 
                                <div align="left" class="form-group col-md-6">
                                    <label class="control-label" for="inativo">Inativo:</label>
                                    <label class="checkbox-inline" for="inativo-0">
                                        <input type="checkbox" id="inativo-0"  name="inativo"value="1" <?php //if ($inativo == 1) { ?>checked="checked"<?php //} ?> >
                                        SIM </label>
                                </div>
                            -->
                            <!-- Select Secao 
                                <div class="form-group col-md-12">
                                    <label>Escolha a SEÇÃO da categoria*</label>
                                    <select required name="secao" id="secao" class="form-control">
                                        <option><?php //echo $secao; ?>
                                        <?php
                                        // $sql = 'SELECT * FROM secoes ORDER BY nome ASC LIMIT 6 OFFSET 5';
                                        /* $sql = 'SELECT * FROM secoes WHERE secoes.inativo = \'0\' ORDER BY id';
                                        $res = mysql_query($sql);
                                        $num = mysql_num_rows($res);
                                        for ($i = 0; $i < $num; $i++) {
                                            $id = mysql_result($res, $i, 'id');
                                            $secao = mysql_result($res, $i, 'nome'); */
                                        ?>
                                        <option value="<?php //echo $id ?>" <?php //if ($id == $secao_id) { ?>selected="selected"<?php //} ?>><?php //echo $secao ?></option> 
                                        <?php
                                        //}
                                        ?>
                                    </select>
                                    <span class="selectRequiredMsg">Selecione um item ou</span><a href="./?area=secoes" data-target="#secoes"> Cadastre nova seção</a>
                                </div>
                            -->
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
                                <input required type="text" id="nome" name="nome" placeholder="Nome* (Obigatório, só aparece p/google)" class="form-control" value="<?php //echo $nome ?>">
                            </div>
            
                            <!-- Text input Titulo-->
                            <div class="form-group col-md-12">
                                <label>Titulo</label>
                                <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-control" value="<?php //echo $titulo ?>">
                            </div>
            
                            <!-- Text input SubTitulo-->
                            <div class="form-group col-md-12">
                                <label>Subtitulo</label>
                                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo" class="form-control" value="<?php //echo $subtitulo ?>">
                            </div>
            
                            <!-- Text input Descrição-->
                            <div class="form-group col-md-12">
                                <label>Descrição</label>
                                <textarea id="descricao" name="descricao" rows="10" class="form-control"><?php //echo $descricao; ?></textarea>
                            </div>
            
                            <!-- File Button Enviar -->
                            <div class="form-group col-md-12">
                                <label class="control-label" for="filebutton"></label>
                                <input type="submit" id="enviar" name="enviar" class="btn btn-success btn-block" value="Cadastrar">
                                <input type="hidden" id="editar" name="editar" class="btn btn-success btn-sm" value="<?php //echo $_GET['editar'] ?>">
                            </div>
                        </fieldset>
                    </form>
                </div>
        
                <div class="col-md-7">
                    <h3>Projetos cadastrados</h3>            
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-responsive">
            
                        <tr align="center">
                            <!-- 
                                <td><strong><a href="./?area=categorias&ordenar=id&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                        echo 'ASC';
                                    } else {
                                        echo 'DESC';
                                    } */ ?>">ID</a></strong>
                                </td>
                            -->
                            <td>
                                <strong><a href="./?area=categorias&ordenar=categorias.inativo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                                        echo 'ASC';
                                                                                                    } else {
                                                                                                        echo 'DESC';
                                                                                                    } */ ?>">Ativo</a></strong>
                            </td>
                            
                            <td><strong><a href="./?area=categorias&ordenar=id&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                        echo 'ASC';
                                                                                    } else {
                                                                                        echo 'DESC';
                                                                                    } */ ?>">Imagem</a></strong>
                            </td>
                            <!-- 
                                <td align="left"><strong><a href="./?area=categorias&ordenar=secao&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                                            echo 'ASC';
                                                                                                            } else {
                                                                                                            echo 'DESC';
                                                                                                            } */ ?>">Seção</a></strong></td>
                            -->
                            <td align="left"><strong><a href="./?area=categorias&ordenar=nome&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                                    echo 'ASC';
                                                                                                    } else {
                                                                                                    echo 'DESC';
                                                                                                    } */ ?>">Projeto</a></strong></td>
                            <td align="left"><strong><a href="./?area=categorias&ordenar=titulo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                                        echo 'ASC';
                                                                                                    } else {
                                                                                                        echo 'DESC';
                                                                                                    } */ ?>">Título</a></strong></td>
                            <!-- 
                            <td align="left"><strong><a href="./?area=categorias&ordenar=subtitulo&ordem=<?php /* if ($_GET['ordem'] == 'DESC') {
                                                                                                            echo 'ASC';
                                                                                                            } else {
                                                                                                            echo 'DESC';
                                                                                                            } */ ?>">Subtítulo</a></strong></td>
                            -->
                            <td></td>
                        </tr>
                        <?php
            
                            // Define a ordem
                            /* if ($_GET['ordenar'] && $_GET['ordem']) {
                                $sql_ordenar = ' ORDER BY ' . $_GET['ordenar'] . ' ' . $_GET['ordem'];
                            } else {
                                $sql_ordenar = ' ORDER BY id DESC';
                            } */
                
                            // lista as categorias encontradas e paginação
                            //$sql = 'SELECT categorias.id, categorias.inativo, categorias.nome, categorias.titulo, categorias.subtitulo, categorias.secao_id AS categoria, secoes.nome AS secao FROM categorias, secoes WHERE categorias.secao_id = secoes.id' . $sql_buscar . $sql_ordenar;
                
                            // lista os registros de uma tabela
                            /* $url = './?area=categorias&busca=' . $_GET['busca'];
                            include('inc.pre-paginacao.php');
                            echo '<p class="alert alert-info" role="alert"><strong>' . $tr . ' projetos encontrados</strong></p>';
                            include('inc.paginacao.php'); */
                
                            // Lista as categorias
                            /* $res = mysql_query($sql);
                            $num = mysql_num_rows($res);
                            for ($i = 0; $i < $num; $i++) {
                                $id = mysql_result($res, $i, 'id');
                                $inativo = mysql_result($res, $i, 'inativo');
                                $secao = mysql_result($res, $i, 'secao');
                                $nome = mysql_result($res, $i, 'nome');
                                $titulo = mysql_result($res, $i, 'titulo');
                                $subtitulo = mysql_result($res, $i, 'subtitulo');
                
                                // formata a data no padrao Brasileiro
                                $data_expira = explode('-', $data_expira);
                                $data_expira = $data_expira[2] . '/' . $data_expira[1] . '/' . $data_expira[0]; */
            
                        ?>
                        @foreach($projetos as $categoria)
                            <tr align="center">
                                <!-- 
                                    <td><?php //echo $id ?></td>
                                -->
                                <td style="width:0; white-space:nowrap;">
                                    @if ($categoria->inativo == 1)
                                        <a href="./?area=categorias&ordenar=' . $_GET['ordenar'] . '&ordem=' . $_GET['ordem'] . '&lista=' . $_GET['lista'] . '&inativo=0&id=' . $id . '"><img src="{{asset('admin/assets/img/ico-negativo.jpg')}}" width="30" height="30" title="Inativo"></a>
                                    @else
                                        <a href="./?area=categorias&ordenar=' . $_GET['ordenar'] . '&ordem=' . $_GET['ordem'] . '&lista=' . $_GET['lista'] . '&inativo=1&id=' . $id . '"><img src="{{asset('admin/assets/img/ico-positivo.jpg')}}" width="30" height="30" title="Ativo"></a>
                                    @endif
                                </td>
                                
                                <td style="width:0; white-space:nowrap;">
                                    @if(public_path('imagens/categorias/thumbs/'.$categoria->id.'.1.jpg'))
                                    <img width="100" class="img-thumbnail" src="{{asset('imagens/categorias/thumbs/'.$categoria->id.'.1.jpg')}}">
                                    @endif
                                </td>
                
                                
                                <!-- 
                                    <td align="left"><?php //echo $secao ?></td>
                                -->
                                <td align="left"><?php echo $categoria->nome ?></td>
                                <td align="left"><?php echo $categoria->titulo ?></td>
                                <!-- 
                                    <td align="left"><?php //echo $subtitulo ?></td>
                                -->
                                <td style="width:0; white-space:nowrap;">
                                    <a class="btn btn-sm btn-primary" href="">Editar</a>
                                    <a class="btn btn-sm btn-primary" href="">Excluir</a>
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