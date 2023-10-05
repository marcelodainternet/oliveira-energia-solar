<section id="contato" class="contact bg-light pb-0" style="margin-top:-60px;">
    <div class="container pb-5">
        @if ($contato->titulo != '')
            <div class="section-title">
                <span>{{$contato->titulo}}</span>
                <h2>{{$contato->titulo}}</h2>
                <h4>{!!$contato->subtitulo!!}</h4>
                <div>{!!$contato->descricao!!}</div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="info" style="padding:10px 20px;">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Atendimento:</h4>
                        <p>{{$configuracao['horatend'];}}</p>
                        <p>{{$configuracao['horatend2'];}}</p>
                        <p>{{$configuracao['horatend3'];}}</p><br/>
                    </div>
                </div>
                <div class="info" style="padding:10px 20px;">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Endereço:</h4>
                        <p>{{$configuracao['endereco'];}}</p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div class="info" style="padding:10px 20px;">
                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Telefone(s):</h4>
                        <p>+55 {{$configuracao['telefone'];}}</p>
                        @if($configuracao['telefone2'] != '')
                            <p>+55 {{$configuracao['telefone2'];}}</p>
                        @endif
                        @if($configuracao['telefone3'] != '')
                            <p>+55 {{$configuracao['telefone3'];}}</p>
                        @endif
                    </div>
                    <br>
                </div>
                <div class="info" style="padding:10px 20px;">
                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>E-mail(s):</h4>
                        <p>{{$configuracao['email'];}}</p>
                        @if ($configuracao['email2'] != '')
                            <p>{{$configuracao['email2'];}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <br><br>
            <div class="offset-lg-2 col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                <div id="mail">
                @if(session()->has('email-enviado'))
                    <div id="mail-enviado" class="alert alert-success">E-mail enviado com sucesso!</div>
                    @endif
                    <form id="form-contato" action="{{url('/contato')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <input type="hidden" name="timestamp" value="{{time()}}">
                        <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Por favor entre com no mínimo 4 caractere" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Telefone:</label>
                            <input type="phone" class="form-control" name="fone" id="fone" placeholder="Seu Whatsapp" data-rule="phone" data-msg="Por favor entre com um telefone válido"/>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>E-mail:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" data-rule="email" data-msg="Por favor entre com um e-mail válido" />
                            <div class="validate"></div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Assunto:</label>
                            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto" data-rule="minlen:4" data-msg="Por favor entre com no mínimo 8 caractere" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label>Mensagem:</label>
                            <textarea class="form-control" name="mensagem" id="mensagem" rows="5" data-rule="required" data-msg="Por favor escreva sua mensagem" placeholder="Mensagem" style="resize:none;"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="text-center" style="margin-top:1rem;">
                            <button name="enviar" type="submit" class="btn btn-warning bg-warning">Enviar Mensagem</button>
                        </div>
                    </form>
                    <div id="contato-resposta" class="alert" style="margin: 1rem 0; visibility: hidden;" data-success="Obrigado, sua mensagem foi enviada com suceso!" data-fail="Erro ao enviar mensagem!">Texto</div>
                </div>
            </div>
    </div>
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1zipTVRzb0nf1GmW6YzahW796CuctI7JD&ehbc=2E312F" width="100%" height="400"></iframe>
</section>
<script>
    window.addEventListener("load", () => {
        let formContato = document.querySelector("#form-contato");

        formContato.addEventListener("submit", (event) => {
            event.preventDefault();

            formContato.enviar.disabled = true;
            formContato.enviar.innerText = "Enviando...";

            let method = formContato.getAttribute("method");
            let action = formContato.getAttribute("action");
            fetch(action, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': formContato._token.value
                },
                body: JSON.stringify({timestamp: formContato.timestamp.value, nome: formContato.nome.value, fone: formContato.fone.value, email: formContato.email.value, assunto: formContato.assunto.value, mensagem: formContato.mensagem.value})
            })
            .then(response => response.text())
            .then(response => JSON.parse(response))
            .then(response => {
                formContato.enviar.disabled = false;
                formContato.enviar.innerText = "Enviar Mensagem";

                if(response.email_enviado) {
                    formContato.nome.value = "";
                    formContato.fone.value = "";
                    formContato.email.value = "";
                    formContato.assunto.value = "";
                    formContato.mensagem.value = "";

                    document.querySelector("#contato-resposta").innerText = document.querySelector("#contato-resposta").getAttribute("data-success");
                    document.querySelector("#contato-resposta").classList.add("alert-success");
                }else{
                    document.querySelector("#contato-resposta").innerText = document.querySelector("#contato-resposta").getAttribute("data-fail");
                    document.querySelector("#contato-resposta").classList.add("alert-danger");
                }
                document.querySelector("#contato-resposta").style.visibility = "visible";
                setTimeout(() => {
                    document.querySelector("#contato-resposta").classList.remove("alert-danger");
                    document.querySelector("#contato-resposta").classList.remove("alert-success");
                    document.querySelector("#contato-resposta").innerText = "Texto";
                    document.querySelector("#contato-resposta").style.visibility = "hidden";
                }, 5000);
            })
            .catch((error) => {
                formContato.enviar.disabled = false;
                formContato.enviar.innerText = "Enviar Mensagem";

                document.querySelector("#contato-resposta").innerText = document.querySelector("#contato-resposta").getAttribute("data-fail");
                document.querySelector("#contato-resposta").classList.add("alert-danger");
                document.querySelector("#contato-resposta").style.visibility = "visible";
                setTimeout(() => {
                    document.querySelector("#contato-resposta").classList.remove("alert-danger");
                    document.querySelector("#contato-resposta").classList.remove("alert-success");
                    document.querySelector("#contato-resposta").innerText = "Texto";
                    document.querySelector("#contato-resposta").style.visibility = "hidden";
                }, 5000);
            });
        });
    });
</script>