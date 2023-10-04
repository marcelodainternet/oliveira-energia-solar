<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <!-- <h3>Oliveira Energia Solar</h3> -->
                        <p>
                            <strong>Endereço:</strong><br>
                            {{$configuracao['endereco']}}<br>
                            <strong>Atendimento:</strong><br>
                            {{$configuracao['horatend']}}<br>
                            {{$configuracao['horatend2']}}
                            {{$configuracao['horatend3']}}
                            <strong>Telefones:</strong><br>
                            {{ $configuracao['telefone'] }} <br>
                            @if($configuracao['telefone2'] != '')
                                {{$configuracao['telefone2']}}<br>
                            @endif
                            @if($configuracao['telefone3'] != '')
                                {{$configuracao['telefone3']}}
                            @endif
                            <strong>E-mail:</strong> <br>
                            {{ $configuracao['email'] }}<br>
                            @if($configuracao['email2'] != '')
                                {{$configuracao['email2']}}<br>
                            @endif
                            @if($configuracao['email3'] != '')
                                {{$configuracao['email3']}}<br>
                            @endif
                        </p>
                        <div class="social-links mt-3">
                            @if($configuracao['facebook'] != '')
                                <a target="_blanc" href="{{$configuracao['facebook']}}" class="facebook"><i class="bx bxl-facebook"></i></a>
                            @endif
                            @if($configuracao['instagram'] != '')
                                <a target="_blanc" href="{{$configuracao['instagram']}}" class="instagram"><i class="bx bxl-instagram"></i></a>
                            @endif
                            @if($configuracao['twitter'] != '')
                                <a target="_blanc" href="{{$configuracao['twitter']}}" class="twitter"><i class="bx bxl-twitter"></i></a>
                            @endif
                            @if($configuracao['linkedin'] != '')
                                <a target="_blanc" href="{{$configuracao['linkedin']}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#home')}}">Energia Solar</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#portfolio')}}">Portfolio</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/#empresa')}}">Quem Somos</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/termos')}}">Termos de Uso</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Extras</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/dicas')}}">Dicas</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/videos')}}">Vídeos</a></li>
                        <!-- <li><i class="bx bx-chevron-right"></i> <a href="downloads.php">Downloads</a></li> -->
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/faq')}}">F.A.Q.</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/privacidade')}}">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Nosso Newsletter</h4>
                    <p>Deixe seu e-mail e receba nossas atualizações e novidades.</p>
                    <form method="post" id="form-newsletter" action="{{url('/lead')}}">
                        @csrf
                        <input type="hidden" name="timestamp" value="{{time()}}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                        </div>
                        <div class="form-group" style="margin-top:10px;">  
                            <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Whatsapp" required>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group" style="margin-top:10px;">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    <div id="lead-resposta" class="alert" style="margin-top:30px; visibility: hidden;" data-success="Dados enviados com sucesso!" data-fail="Erro ao enviar dados!"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright {{date('Y')}} <strong>{{$configuracao['titulo']}}</strong>. Todos os direitos reservados.
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
            Desenvolvido por <a target="_blanc" href="https://api.whatsapp.com/send?phone=5548998327848&text=Olá Marcelo venho do site {{$configuracao['titulo']}}, você pode me atender?" target="_blank">Marcelo Silveira</a>
        </div>
    </div>
</footer>
<script>
    window.addEventListener("load", () => {
        let formNewsletter = document.querySelector("#form-newsletter");
        formNewsletter.addEventListener("submit", (event) => {
            event.preventDefault();
            let method = formNewsletter.getAttribute("method");
            let action = formNewsletter.getAttribute("action");
            fetch(action, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': formNewsletter._token.value
                },
                body: JSON.stringify({nome: formNewsletter.nome.value, telefone: formNewsletter.telefone.value, email: formNewsletter.email.value})
            })
            .then(response => response.text())
            .then(response => JSON.parse(response))
            .then(response => {
                if(response.lead_enviada) {
                    formNewsletter.nome.value = "";
                    formNewsletter.telefone.value = "";
                    formNewsletter.email.value = "";    
                    document.querySelector("#lead-resposta").innerText = document.querySelector("#lead-resposta").getAttribute("data-success");
                    document.querySelector("#lead-resposta").classList.add("alert-success");
                }else{
                    document.querySelector("#lead-resposta").innerText = document.querySelector("#lead-resposta").getAttribute("data-fail");
                    document.querySelector("#lead-resposta").classList.add("alert-danger");
                }
                document.querySelector("#lead-resposta").style.visibility = "visible";
                setTimeout(() => {
                    document.querySelector("#lead-resposta").classList.remove("alert-danger");
                    document.querySelector("#lead-resposta").classList.remove("alert-success");
                    document.querySelector("#lead-resposta").style.visibility = "hidden";
                }, 5000);
            })
            .catch((error) => {
                document.querySelector("#lead-resposta").innerText = document.querySelector("#lead-resposta").getAttribute("data-fail");
                document.querySelector("#lead-resposta").classList.add("alert-danger");
                document.querySelector("#lead-resposta").style.visibility = "visible";
                setTimeout(() => {
                    document.querySelector("#lead-resposta").classList.remove("alert-danger");
                    document.querySelector("#lead-resposta").classList.remove("alert-success");
                    document.querySelector("#lead-resposta").style.visibility = "hidden";
                }, 5000);
            });
        });
    });
</script>