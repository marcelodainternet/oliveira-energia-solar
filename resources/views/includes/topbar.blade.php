<section id="topbar" class="fixed-top d-flex" style="background-color:{{$configuracao['cor2']}}; color:{{$configuracao['cortxt4']}};">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">

            <i class="bi bi-phone d-flex align-items-center">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{$configuracao['telefone']}}&text={{$configuracao['whatstxt']}}" style="color:{{$configuracao['cortxt4']}}">
                    <small>{{$configuracao['telefone']}}</small>
                </a>
            </i>

            @if($configuracao['telefone2'] != '')
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <a href="tel:+55{{$configuracao['telefone2']}}" style="color:{{$configuracao['cortxt4']}};">
                        <small>{{$configuracao['telefone2']}}</small>
                    </a>
                </i>
            @endif

            @if($configuracao['telefone3'] != '')  
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <a href="tel:{{$configuracao['telefone3']}}" style="color:{{$configuracao['cortxt4']}};">
                        <small>{{$configuracao['telefone3']}}</small>
                    </a>
                </i>
            @endif

            <i class="d-none bi bi-envelope d-md-flex align-items-center ms-4">
                <a href="mailto:{{$configuracao['email'];}}" style="color:{{$configuracao['cortxt4'];}};">
                    <small>{{$configuracao['email']}}</small>
                </a>
            </i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center" style="gap: 1rem;">
            @if($configuracao['facebook'] != '')
                <a target="_blanc" href="{{$configuracao['facebook']}}" class="facebook p-0 border-0" style="color:{{$configuracao['cortxt4']}};"><i class="bi bi-facebook"></i></a>
            @endif
            @if($configuracao['instagram'] != '')
                <a target="_blanc" href="{{$configuracao['instagram']}}" class="instagram p-0 border-0" style="color:{{$configuracao['cortxt4']}};"><i class="bi bi-instagram"></i></a>
            @endif
            @if($configuracao['twitter'] != '')
                <a target="_blanc" href="{{$configuracao['twitter']}}" class="twitter p-0 border-0" style="color:{{$configuracao['cortxt4']}};"><i class="bi bi-twitter"></i></a>
            @endif
            @if($configuracao['linkedin'] != '')
                <a target="_blanc" href="{{$configuracao['linkedin']}}" class="linkedin p-0 border-0" style="color:{{$configuracao['cortxt4']}};"><i class="bi bi-linkedin"></i></i></a>
            @endif
        </div>
    </div>
</section>