<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Admin</title>
  <meta name="author" content="Marcelo Silveira (48) 99977-5791">
  <meta name="Reply-to" content="marcelodainternet@gmail.com">
  <meta name="theme-color" content="#1f2627">
  <meta name="apple-mobile-web-app-status-bar-style" content="#1f2627">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('imagens/favicon.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('imagens/favicon.png')}}">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('imagens/favicon.png')}}">
  <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-3.2.0/css/bootstrap.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/admin-assets/css/font-awesome.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/admin-assets/css/basic.css')}}"/>
  <link rel="stylesheet" href="{{asset('assets/admin-assets/css/custom.css')}}"/>
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans'/>
</head>

<body style="background-color:#1f2627; color:#FFF;">
    <div class="container">
        <div class="row text-center" style="padding-top:50px; margin-bottom:-20px;">
            <div class="col-md-12" style="display:flex; flex-flow:column; align-items:center;">
                <img class="img-responsive" src=" {{asset("assets/imagens/logo-dark.png")}}" width="200"><br>
                <h4>---- ÁREA RESTRITA ----</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel-body">
                    <form role="form" method="post" action="{{route('authenticate')}}">
                        @csrf
                        <hr/>
                        <h5>Entre com seus dados de Login:</h5>
                        <br/>
                        <div class="form-group {{$errors->has('usuario')?'has-error':''}}">
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width: 15px;" class="fa fa-tag"></i></span>
                                <input type="text" id="usuario" name="usuario" value="{{old('usuario')}}" {{$errors->has('usuario')?'autofocus':''}} class="form-control" placeholder="Usuário" required/>
                            </div>
                            @if($errors->has('usuario'))
                                <div class="text-danger">{{$errors->first('usuario')}}</div>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('senha')?'has-error':''}}">
                            <div class="input-group">
                                <span class="input-group-addon"><i style="width: 15px;" class="fa fa-lock"></i></span>
                                <input type="password" id="senha" name="senha" {{$errors->has('senha')?'autofocus':''}} class="form-control" placeholder="Senha" required/>
                            </div>
                            @if($errors->has('senha'))
                                <div class="text-danger">{{$errors->first('senha')}}</div>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label class="checkbox-inline" style="color:#FFF;">
                                <input name="lembrar" type="checkbox"/>
                                Lembre-me
                            </label>
                            <span class="pull-right"> <a href="esqueci-senha.php" >Esqueceu sua Senha? </a> </span>
                        </div> -->
                        <br>
                        <input type="submit" name="login" value="Entrar" class="btn btn-primary btn-block center">
                        <hr/>
                        <div style="text-align:center;color:#FFF;">Não lembra seus dados de login? <br> <a href="https://api.whatsapp.com/send?phone=5548999775791&text=Olá Marcelo, venho do ADM do site {{url('/')}}, não lembro meus dados de login, você pode me ajudar?">Fale com o desenvolvedor.</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>