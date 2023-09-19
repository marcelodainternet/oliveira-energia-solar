@extends("admin.layout")
@section("head")
  <title>E-mails Lead's - Admin</title>
@endsection
@section("content")
<div class="row">
  <div class="col-md-12">
    <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | E-mails LEAD'S</h2>
    <h4 class="panel-default text-info">Cadastre ou Edite E-mails CAPTADOS!</h4>
  </div>
</div>
<br/>
  <div class="page-content">
    <div class="page-container">
      <div class="row"> 
        <div class="col-md-5">
          <div class="titulo-pagina">
            <h3>Cadastro e Edição de Lead's</h3>
          </div>
          <?php
              /* if($_POST['nome']){
              
              if($_POST['editar']){
              // altera no banco de dados
              $sql = 'UPDATE emails_cap SET 
              nome = \''.$_POST['nome'].'\', 
              empresa = \''.$_POST['empresa'].'\', 
              telefone = \''.$_POST['telefone'].'\', 
              fonte = \''.$_POST['fonte'].'\', 
              observacao = \''.$_POST['observacao'].'\', 
              data_ultimo_acesso = \''.$_POST['data_ultimo_acesso'].'\', 
              email = \''.$_POST['email'].'\' WHERE id = \''.$_POST['editar'].'\'';
              $res = mysql_query($sql); */
          ?>
          <p class="mensagem">Lead alterado com sucesso!</p>
          <?php
            /* }
            else { */
            // insere no banco de dados
            /* $sql = 'INSERT INTO emails_cap SET 
            nome = \''.$_POST['nome'].'\', 
            empresa = \''.$_POST['empresa'].'\', 
            telefone = \''.$_POST['telefone'].'\', 
            fonte = \''.$_POST['fonte'].'\', 
            observacao = \''.$_POST['observacao'].'\', 
            email = \''.$_POST['email'].'\'';
            $data_cadastro = mysql_result($res, $i, 'data_cadastro');
            $res = mysql_query($sql); */
          ?>
          <p class="mensagem">Lead cadastrado com sucesso!</p>
          <?php
              /* }
              
              } */
              
              // exclui do banco de dados
              /* if($_GET['excluir']){
              $sql = 'DELETE FROM emails_cap WHERE id = \''.$_GET['excluir'].'\'';
              $res = mysql_query($sql);
              ?>
                  <p class="mensagem">Lead exclu&iacute;do com sucesso!</p>
                  <?php
              } */
              
              // carrega os dados para edi&ccedil;&atilde;o
              /* if($_GET['editar']){
              $sql = 'SELECT * FROM emails_cap WHERE id = \''.$_GET['editar'].'\'';
              $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for($i=0;$i<$num;$i++){
              $nome = mysql_result($res, $i, 'nome');
              $empresa = mysql_result($res, $i, 'empresa');
              $telefone = mysql_result($res, $i, 'telefone');
              $email = mysql_result($res, $i, 'email');
              $fonte = mysql_result($res, $i, 'fonte');
              $observacao = mysql_result($res, $i, 'observacao');
              $data_ultimo_acesso = mysql_result($res, $i, 'data_ultimo_acesso');
              }
              } */
              
          ?>
          <form id="form1" name="form1" method="post" action="./?area=emails_cap">
            <div class="form-group">
              <label>Nome:</label>
              <input type="text" id="nome" name="nome" class="form-control" value="<?php //echo $nome ?>">
            </div>
            <div class="form-group">
              <label>Empresa:</label>
              <input type="text" id="empresa" name="empresa" class="form-control" value="<?php //echo $empresa ?>">
            </div>
            <div class="form-group">
              <label>Telefone:</label>
              <input type="text" id="telefone" name="telefone" class="form-control" value="<?php //echo $telefone ?>">
            </div>
            <div class="form-group">
              <label>E-mail:</label>
              <input type="text" id="email" name="email" class="form-control" value="<?php //echo $email ?>">
            </div>
            <div class="form-group">
              <label>Fonte:</label>
              <input type="text" id="fonte" name="fonte" class="form-control" value="<?php //echo $fonte ?>">
            </div>
            <div class="form-group">
              <label>Observações:</label>
              <input type="text" id="observacao" name="observacao" class="form-control" value="<?php //echo $observacao ?>">
            </div>
            <div class="form-group">
              <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-block btn-success" value="Cadastrar">
              <input type="hidden" id="editar" name="editar" class="btn btn-success" value="<?php //echo $_GET['editar'] ?>">
            </div>
          </form>
        
        </div>
        <div class="col-md-7">
        
          <div class="titulo-pagina">
            <h3>Lead's Captados</h3>
          </div>
          <table class="table table-striped table-responsive">
            <tr align="center">
              <td><strong>Nome</strong></td>
              <td><strong>Fone</strong></td>
              <td><strong>E-mail</strong></td>
              <td><strong></strong></td>
            </tr>
            <?php
        
              // lista os registros de uma tabela
              /* $sql = 'SELECT * FROM emails_cap ORDER BY nome';
              $res = mysql_query($sql);
              $num = mysql_num_rows($res);
              for($i=0;$i<$num;$i++){
              $id = mysql_result($res, $i, 'id');
              $nome = mysql_result($res, $i, 'nome');
              $email = mysql_result($res, $i, 'email');
              $telefone = mysql_result($res, $i, 'telefone'); */
              
            ?>
            @foreach($leads as $lead)
              <tr style="text-align:center;">
                <td>{!!$lead->nome != ""?$lead->nome:'<i class="text-muted">Sem nome</i>'!!}</td>
                <td>
                  @if($lead->telefone)
                    <a href="https://api.whatsapp.com/send?phone=55<?php echo $lead->telefone; ?>&text=Olá <?php echo $lead->nome ?>," target="_blanc" class="imgwhats"> <img src="../imagens/whats.fw.png" width="20"> </a> <?php //echo $telefone ?>
                  @else
                    <i class="text-muted">Sem telefone</i>
                  @endif
                </td>
                <td><?php echo $lead->email ?></td>
                <td style="width:0; white-space:nowrap;">
                  <a class="btn btn-sm btn-primary" href="./?area=emails_cap&editar=<?php //echo $id ?>">Editar</a>
                  <a class="btn btn-sm btn-danger" onClick="return confirmLink(this, 'excluir o cliente <?php //echo $nome ?>?')" href="./?area=emails_cap&excluir=<?php //echo $id ?>">Excluir</a></td>
              </tr>
            @endforeach
            <?php
              //}
            ?>
          </table>
        </div>
    </div>
    <div class="row">
  
    <div class="col-md-12"> 
    <div class="titulo-pagina" align="center">
      <h3>Lead's para Newsletter</h3>
    </div>
    <textarea class="form-control" name="textarea" id="textarea"rows="5">    
      <?php
      // lista os registros de uma tabela
      /* $sql = 'SELECT * FROM emails_cap ORDER BY nome';
      $res = mysql_query($sql);
      $num = mysql_num_rows($res);
      for($i=0;$i<$num;$i++){
      $id = mysql_result($res, $i, 'id');
      $nome = mysql_result($res, $i, 'nome');
      $email = mysql_result($res, $i, 'email');
      $telefone = mysql_result($res, $i, 'telefone');
      echo '"'.$nome.'" <'.$email.'>, ';
      } */
      ?>
    </textarea>
    <br>
    <br>
  </div>
  
    </div>
    <div class="row">
  
    <div class="col-md-12"> 
    <div class="titulo-pagina" align="center">
      <h3>Clientes para Newsletter</h3>
    </div>
  <textarea class="form-control" name="textarea" id="textarea"rows="5">
      
  <?php
  // lista os registros de uma tabela
  /* $sql = 'SELECT * FROM clientes ORDER BY nome';
  $res = mysql_query($sql);
  $num = mysql_num_rows($res);
  for($i=0;$i<$num;$i++){
  $id = mysql_result($res, $i, 'id');
  $nome = mysql_result($res, $i, 'nome');
  $email = mysql_result($res, $i, 'email');
  echo '"'.$nome.'" <'.$email.'>, ';
  } */
  ?>
  </textarea>
    <br>
    <br>
  </div>
  
    </div>
    <div class="row">
  
    <div class="col-md-12">
    <div class="titulo-pagina" align="center">
      <h3>Colaboradores para Newsletter</h3>
    </div>
  <textarea class="form-control" name="textarea" id="textarea"rows="5">
      
  <?php
  // lista os registros de uma tabela
  /* $sql = 'SELECT * FROM colaboradores ORDER BY nome';
  $res = mysql_query($sql);
  $num = mysql_num_rows($res);
  for($i=0;$i<$num;$i++){
  $id = mysql_result($res, $i, 'id');
  $nome = mysql_result($res, $i, 'nome');
  $email = mysql_result($res, $i, 'email');
  echo '"'.$nome.'" <'.$email.'>, ';
  } */
  ?>
  </textarea>
    <br>
    <br>
    <br>
        </div>
        
      </div>
    </div>
  </div>
  
@endsection