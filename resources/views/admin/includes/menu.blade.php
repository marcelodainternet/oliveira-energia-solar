<header class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="position: sticky; background-color:#1f2627; margin-bottom:0;">
    <div class="navbar-header" style="background-color:#1f2627;">
        <button style="margin-top:15px;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" style="background-color:#1f2627;" href="{{url('adm')}}">
            <img class="img-responsive" width="200" src="{{asset('assets/img/logo-dark2.png')}}">
        </a>
    </div>
    <nav style="position: absolute; background-color:#2a3336; width:100%;" class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
            <!--
                <li class=""> <a href="./"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <span class="pull-right-container"></span></a></li>
                <li> <a href="#"> <i class="fa fa-edit"></i> <span>Agenda</span> <span class="pull-right-container"> </span> </a></li>
                <li> <a href="./?area=tarefas"> <i class="fa fa-edit"></i> <span>Tarefas</span> <span class="pull-right-container"> </span> </a></li>
                <li> <a href="lancamentos_listar.php"> <i class="fa fa-edit"></i> <span>Lançamentos</span> <span class="pull-right-container"> </span> </a></li>
                <li> <a href="pedidos.php"> <i class="fa fa-edit"></i> <span>Pedidos</span> <span class="pull-right-container"> </span> </a></li>
                <li>
                <form action="produtos_listar.php" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar produto...">
                            <span class="input-group-btn">
                                <button type="submit" name="buscar-produto" id="buscar-produto" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                            </span>
                        </div> 
                    </form>
                </li>
                <li> 
                    <form action="clientes_listar.php" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="busca" id="busca" class="form-control" placeholder="Buscar cliente...">
                            <span class="input-group-btn">
                            <button type="submit" name="buscar-cliente" id="buscar-cliente" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                    </form>
                    <?php
                        // Define a busca
                        /* if($_GET['busca']){
                            $sql_buscar = 'WHERE 
                            data_cadastro LIKE\'%'.$_GET['busca'].'%\' OR 
                            nome LIKE\'%'.$_GET['busca'].'%\' OR 
                            sobrenome LIKE\'%'.$_GET['busca'].'%\' OR 
                            nome_fantasia LIKE\'%'.$_GET['busca'].'%\' OR 
                            razao_social LIKE\'%'.$_GET['busca'].'%\' OR 
                            telefone LIKE\'%'.$_GET['busca'].'%\' OR 
                            telefone2 LIKE\'%'.$_GET['busca'].'%\' OR 
                            email LIKE\'%'.$_GET['busca'].'%\' OR 
                            cidade LIKE\'%'.$_GET['busca'].'%\' OR 
                            estado LIKE\'%'.$_GET['busca'].'%\'
                            ';
                        } */
                        
                        // Define a ordem
                        /* if($_GET['ordenar'] && $_GET['ordem']){
                            $sql_ordenar = ' ORDER BY '.$_GET['ordenar'].' '.$_GET['ordem'];  
                        }
                        else {
                            $sql_ordenar = ' ORDER BY id DESC'; 
                        } */
                    ?>
                </li>
                <li><a href="colaboradores_listar.php"><i class="fa fa-users "></i> Colaboradores</a> </li>
                <li>
                    <a><i class="fa fa-code"></i> E-mails </a>
                    <ul>
                        <li> <a href="./?area=emails_aut"><i class="fa fa-email "></i> E-mails Autom&aacute;ticos</a> </li>
                        <li> <a href="./?area=emails_mkt"><i class="fa fa-e-mail "></i> E-mails Marketing</a> </li>   
                    </ul>
                </li>
                <li>
                    <a><i class="fa fa-code"></i> Configura&ccedil;&otilde;es </a>
                    <ul>
                        <li><a href="./?area=configuracoes&editar=1"><i class="fa fa-code "></i> Configura&ccedil;&otilde;es Gerais</a> </li>
                        <li> <a href="./?area=secoes"><i class="fa fa-folder "></i> Se&ccedil;&otilde;es</a> </li>
                        <li> <a href="./?area=categorias"><i class="fa fa-folder "></i> Categorias</a> </li>
                        <li> <a href="./?area=subcategorias"><i class="fa fa-folder "></i> Subcategorias</a> </li>
                        <li><a href="./?area=postagens"><i class="fa fa-edit "></i> Postagens no Site</a> </li>
                    </ul>
                </li>
                <li> <a href="./?area=produtos"><i class="fa fa-code "></i>Produtos</a> </li>
                <li> <a href="./?area=inicio"><i class="fa fa-code "></i>Slide Inicial</a> </li>
                <li> <a href="./?area=empresa&editar=1"><i class="fa fa-code "></i>Pousada</a> </li>
                <li> <a href="./?area=estatisticas"><i class="fa fa-code "></i>Acomoda?es</a> </li>
                <li> <a href="./?area=depoimentos"><i class="fa fa-code "></i>Depoimentos</a> </li>
                <li> <a href="./?area=galeria"><i class="fa fa-code "></i>Galeria</a> </li>
                <li> <a href="./?area=videos"><i class="fa fa-code "></i>V?eos</a> </li>
                <li> <a href="./?area=downloads"><i class="fa fa-code "></i>Downloads</a> </li>
                <li> <a href="./?area=faq"><i class="fa fa-code "></i>F.A.Q.</a> </li>
                <li> <a href="servicos.php"><i class="fa fa-code "></i>Servi?s</a> </li>
                <li> <a href="parceiros.php"><i class="fa fa-code "></i>Parceiros</a> </li>
            -->
                <li><a class="{{request()->is('adm/configuracoes*')?'active':''}}" href="{{url('/adm/configuracoes')}}"><i class="fa fa-code "></i> Configura&ccedil;&otilde;es Gerais</a> </li>
                <li><a class="{{request()->is('adm/secoes*')?'active':''}}" href="{{url('/adm/secoes')}}"><i class="fa fa-folder "></i> Se&ccedil;&otilde;es</a> </li>
                <li><a class="{{request()->is('adm/projetos*')?'active':''}}" href="{{url('/adm/projetos')}}"><i class="fa fa-folder "></i> Projetos</a> </li>
                <li><a class="{{request()->is('adm/leads*')?'active':''}}" href="{{url('/adm/leads')}}"><i class="fa fa-folder "></i> E-mails Capitados</a> </li>
                <li><a class="{{request()->is('adm/usuarios*')?'active':''}}" href="{{url('/adm/usuarios')}}"><i class="fa fa-users "></i> Usu&aacute;rios</a> </li>
                <li><a target="_blank" href="https://api.whatsapp.com/send?phone=5548999775791&text=Olá Marcelo, sou seu cliente de site, você pode me atender?"> <i class="fa fa-code "></i> <span>Suporte</span> </a> </li>
                <li><a href="{{route('login')}}"><i class="fa fa-sign-out"></i> Sair</a> </li>
            </ul>
        </div>
    </nav>
</header>