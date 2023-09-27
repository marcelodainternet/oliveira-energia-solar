@extends("admin.layout")
@section("head")
    <title>Usuários - Admin</title>
@endsection
@section("content")
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
                                    <form id="form-criar-usuario" method="post" action="{{route('usuarios.inserir')}}" class="form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label">Nome*: </label>
                                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Usuário para login*: </label>
                                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuário" required>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Telefone: </label>
                                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone">
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-mail*: </label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Senha*: </label>
                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Confirme a senha*: </label>
                                            <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control" placeholder="Confirme a senha" required>
                                            <span class="help-block"></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button form="form-criar-usuario" type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{url('/adm/usuarios')}}" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Voltar</a>
                @endif
            </div>
            <hr>
            @if(session()->get("excluido"))
                <div class="alert alert-success" role="alert">Usuário excluído com sucesso!
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif
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
                                <td style="vertical-align: middle;">{{$usuario->nome}}</td>
                                <td style="vertical-align: middle;">{{$usuario->usuario}}</td>
                                <td style="vertical-align: middle;">{{$usuario->telefone}}</td>
                                <td style="vertical-align: middle;">{{$usuario->email}}</td>
                                <td style="width:0; white-space:nowrap;">
                                    <button data-toggle="modal" data-target="#editar-usuario-{{$usuario->id}}" class="btn btn-sm btn-primary with-tip edit" title="editar usuário" id="{{$usuario->id}}">
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
                                                    <form class="form-atualizar-usuario" id="atualizar-usuario-{{$usuario->id}}" method="post" action="{{route('usuarios.atualizar', ['usuario' => $usuario->id])}}" class="form" onSubmit="return valida()" action="usuarios.php?action=atualiza&id=<?php echo $usuario->id ?>">
                                                        @csrf
                                                        @method('put')
                                                        <div class="form-group">
                                                            <label class="control-label">Nome*: </label>
                                                            <input type="text" name="nome" class="form-control" value="{{$usuario->nome}}">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Usuário para login*: </label>
                                                            <input type="text" name="usuario" class="form-control" value="{{$usuario->usuario}}">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Telefone: </label>
                                                            <input type="text" name="telefone" class="form-control" value="{{$usuario->telefone}}">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">E-mail*: </label>
                                                            <input type="text" name="email" class="form-control" value="{{$usuario->email}}">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Senha: </label>
                                                            <input type="password" name="senha" class="form-control" placeholder="Altere a Senha">
                                                            <span class="help-block"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Confirme a senha: </label>
                                                            <input type="password" name="confirmar_senha" class="form-control" placeholder="Altere a Senha">
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    <button form="atualizar-usuario-{{$usuario->id}}" type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button data-toggle="modal" data-target="#excluir-usuario-{{$usuario->id}}" class="btn btn-sm btn-danger with-tip delete" title="remover usuário" id="{{$usuario->id}}">
                                        Excluir
                                    </button>
                                    <div class="modal fade" id="excluir-usuario-{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="meuModalLabel">Excluir Usuário</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Deseja realmente excluir este usuário?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <form id="form-excluir-usuario-{{$usuario->id}}" method="post" action="{{route('usuarios.excluir', ['usuario' => $usuario->id])}}" class="form" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load", () => {
            document.querySelectorAll(".form-atualizar-usuario, #form-criar-usuario").forEach(form => {
                form.addEventListener("submit", (event) => {
                    event.preventDefault();
                
                    form.querySelectorAll('.form-group').forEach(formGroup => {
                        formGroup.classList.remove('has-error');
                        formGroup.querySelector('.help-block').textContent = '';
                    });

                    let isValid = true;

                    if (form.senha.value !== "" && form.senha.value !== form.confirmar_senha.value) {
                        form.confirmar_senha.parentNode.classList.add('has-error');
                        form.confirmar_senha.nextElementSibling.textContent = 'As senhas não conferem.';
                        form.confirmar_senha.focus();
                        isValid = false;
                    }

                    if (isValid) form.submit();
                });
            });
        });
    </script>
@endsection