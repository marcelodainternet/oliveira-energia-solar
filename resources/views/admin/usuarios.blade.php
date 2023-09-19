@extends("admin.layout")
@section("head")
    <title>Usuários - Admin</title>
@endsection
@section("content")
    <?php 
        /* include('inc.conecta.php'); 

        if ( isset( $_GET['action'] ) && $_GET['action'] == 'incluir' )
        {
            if ( isset( $_POST['usuario'] ) && !empty( $_POST['usuario'] ) && isset( $_POST['senha'] ) && !empty( $_POST['senha'] ) )
            {
                $senha = md5( trim( $_POST['senha'] ) );
                $email = trim( $_POST['email'] );
                $telefone = trim( $_POST['telefone'] );
                $usuario = trim( $_POST['usuario'] );
                $nome = trim( $_POST['nome'] );
                $db->query( "insert into usuarios (usuario,senha,email,telefone,nome) values ('$usuario','$senha','$email','$telefone','$nome');" );
                @header( 'Location: usuarios.php?success' );
            }
            else
            {
                @header( 'Location: usuarios.php?error&action=novo' );
            }
        }

        if ( isset( $_GET['action'] ) && $_GET['action'] == 'atualiza' )
        {
            if ( isset( $_POST['usuario'] ) && !empty( $_POST['usuario'] ) )
            {
                $id = $_GET['id'];
                $nome = trim( $_POST['nome'] );
                $usuario = trim( $_POST['usuario'] );
                $telefone = trim( $_POST['telefone'] );
                $email = trim( $_POST['email'] );

                $cond = " set nome = '$nome', usuario = '$usuario', telefone = '$telefone', email = '$email' ";
                if ( isset( $_POST['senha'] ) && $_POST['senha'] != "" )
                {
                    $senha = md5( trim( $_POST['senha'] ) );
                    $cond .= ", senha = '$senha' ";
                }
                $db->query( "update usuarios  $cond where id = $id" );
                @header( 'Location: usuarios.php?success' );
            }
        }

        if ( isset( $_GET['action'] ) && $_GET['action'] == 'remove' )
        {
            if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) )
            {
                $id = $_GET['id'];
                $db->query( "delete from usuarios where id = $id" );
                @header( 'Location: usuarios.php?success' );
            }
        }

        if ( isset( $_GET['success'] ) )
        {
            echo "<script>window.onload = function(){notify('<h1>Dados Atualizados</h1>')}</script>";
        }
        if ( isset( $_GET['error'] ) )
        {
            echo "<script>window.onload = function(){notify('<h1>Informe todos os dados!</h1>')}</script>";
        } */
    ?>

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-head-line"><a href="{{url('/adm')}}"><i class="ace-icon fa fa-home home-icon"></i></a> | USUÁRIOS</h2>
            <h4 class="panel-default text-info">Adicione, edite e exclua usuários para administrar o site! </h4><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div style="text-align:center;">
                @if(!$acao)
                    <button data-toggle="modal" data-target="#novo-usuario" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Cadastrar Novo Usuário</button>
                    <div class="modal fade" id="novo-usuario" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="meuModalLabel">Novo Usuário</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="criar-usuario" method="post" class="form" onSubmit="return valida()" action="usuarios.php?action=incluir">
                                        <div class="form-group">
                                            <label class="control-label">Nome*: </label>
                                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Usuário para login*: </label>
                                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuário" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Telefone: </label>
                                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-mail*: </label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Senha*: </label>
                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Confirme a senha*: </label>
                                            <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control" placeholder="Confirme a senha">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button form="criar-usuario" type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{url('/adm/usuarios')}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Voltar</a>
                @endif
            </div>
            <hr>
            <strong>Usuários cadastrados:</strong>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Login</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">E-mail</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->nome}}</td>
                                <td>{{$usuario->usuario}}</td>
                                <td>{{$usuario->telefone}}</td>
                                <td>{{$usuario->email}}</td>
                                <td style="width:0; white-space:nowrap;">
                                    <button data-toggle="modal" data-target="#editar-usuario-{{$usuario->id}}" class="btn btn-sm btn-primary with-tip edit" title="editar usuário" id="{{$usuario->id}}" href="usuarios.php?edit={{$usuario->id}}">
                                        Editar
                                    </button>

                                    <div class="modal fade" id="editar-usuario-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="meuModalLabel">Editar Usuário</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="atualizar-usuario" method="post" class="form" onSubmit="return valida()" action="usuarios.php?action=atualiza&id=<?php echo $usuario->id ?>">
                                                        <div class="form-group">
                                                            <label class="control-label">Nome*: </label>
                                                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $usuario->nome ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Usuário para login*: </label>
                                                            <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario->usuario ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Telefone: </label>
                                                            <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $usuario->telefone ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">E-mail*: </label>
                                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $usuario->email ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Senha*: </label>
                                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Altere a Senha" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Confirme a senha*: </label>
                                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Altere a Senha" >
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button form="atualizar-usuario" type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-danger with-tip delete" title="remover usuário" id="{{$usuario->id}}" href="usuarios.php?action=remove&id=$u->id" onclick="return confirmLink(this, 'excluir este item?')">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection