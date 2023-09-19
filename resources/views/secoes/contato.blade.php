<section id="contato" class="contact bg-light pb-0" style="margin-top:-60px;">
    <div class="container pb-5">
        @if ($contato->titulo != '')
            <div class="section-title">
                <span><?php echo $contato->titulo ?></span>
                <h2><?php echo $contato->titulo ?></h2>
                <h4><?php echo $contato->subtitulo ?></h4>
                <div><?php echo $contato->descricao ?></div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Atendimento:</h4>
                        <p><?php echo $configuracao['horatend']; ?></p>
                        <p><?php echo $configuracao['horatend2']; ?></p>
                        <p><?php echo $configuracao['horatend3']; ?></p><br/>
                    </div>
                </div>
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Endereço:</h4>
                        <p><?php echo $configuracao['endereco']; ?></p>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div class="info">
                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Telefone(s):</h4>
                        <p>+55 <?php echo $configuracao['telefone']; ?></p>
                        <?php if ($configuracao['telefone2'] != '') { ?>
                            <p>+55 <?php echo $configuracao['telefone2']; ?></p>
                        <?php } ?>
                        <?php if ($configuracao['telefone3'] != '') { ?>
                            <p>+55 <?php echo $configuracao['telefone3']; ?></p>
                        <?php } ?>
                    </div>
                    <br>
                </div>
                <div class="info">
                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>E-mail(s):</h4>
                        <p><?php echo $configuracao['email']; ?></p>
                        <?php if ($configuracao['email2'] != '') { ?>
                            <p><?php echo $configuracao['email2']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <!-- 
            <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                <div id="mail">
                    <form action="enviar.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                        <div class="col-md-5 form-group">
                        <label>Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu Nome" data-rule="minlen:4" data-msg="Por favor entre com no mínimo 4 caractere" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-3 form-group">
                        <label>Telefone:</label>
                            <input type="phone" class="form-control" name="fone" id="fone" placeholder="Seu Whatsapp" data-rule="phone" data-msg="Por favor entre com um telefone válido"/>
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-4 form-group">
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
                        <textarea class="form-control" name="mensagem" id="mensagem" rows="5" data-rule="required" data-msg="Por favor escreva sua mensagem" placeholder="Mensagem"></textarea>
                        <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                        <div class="loading">Carregando...</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Obrigado, sua mensagem foi enviada com suceso!</div>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-warning bg-warning">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>
        -->
    </div>
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1zipTVRzb0nf1GmW6YzahW796CuctI7JD&ehbc=2E312F" width="100%" height="400"></iframe>
</section>