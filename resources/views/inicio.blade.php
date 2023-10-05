@extends("layout")
@section("titulo")

<title>{{$configuracao['titulo']}}</title>
@endsection
@section("head")
    <style>
        .cookieConsentContainer {
            z-index: 999;
            width: 350px;
            min-height: 20px;
            box-sizing: border-box;
            padding: 30px 30px 30px 30px;
            background: #232323;
            overflow: hidden;
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: none
        }

        .cookieConsentContainer .cookieTitle a {
            font-family: OpenSans, arial, sans-serif;
            color: #fff;
            font-size: 22px;
            line-height: 20px;
            display: block
        }

        .cookieConsentContainer .cookieDesc p {
            margin: 0;
            padding: 0;
            font-family: OpenSans, arial, sans-serif;
            color: #fff;
            font-size: 13px;
            line-height: 20px;
            display: block;
            margin-top: 10px
        }

        .cookieConsentContainer .cookieDesc a {
            font-family: OpenSans, arial, sans-serif;
            color: #fff;
            text-decoration: underline
        }

        .cookieConsentContainer .cookieButton a {
            display: inline-block;
            font-family: OpenSans, arial, sans-serif;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            margin-top: 14px;
            background: #27CED7;
            box-sizing: border-box;
            padding: 15px 24px;
            text-align: center;
            transition: background .3s;
        }

        .cookieConsentContainer .cookieButton a:hover {
            cursor: pointer;
            background: #3BACC3
        }

        @media (max-width:980px) {
            .cookieConsentContainer {
                bottom: 0 !important;
                left: 0 !important;
                width: 100% !important
            }
        }
    </style>
@endsection
@section("content")    
    <main id="main">
        @if($vitrine && !$vitrine->inativo)
            @include('secoes.vitrine')
        @endif
        @if($principal && !$principal->inativo)
            @include('secoes.home')
        @endif
        @if($vitrine2 && !$vitrine2->inativo)
            @include('secoes.vitrine2')
        @endif
        @if($destaque && !$destaque->inativo)
            @include('secoes.destaque')
        @endif
        @if($vitrine3 && !$vitrine3->inativo)
            @include('secoes.vitrine3')
        @endif
        @if($parceiros && !$parceiros->inativo)
            @include('secoes.parceiros')
        @endif
        @if($portfolio && !$portfolio->inativo)
            @include('secoes.portfolio')
        @endif
        @if($depoimentos && !$depoimentos->inativo)
            @include('secoes.depoimentos')
        @endif
        @if($empresa && !$empresa->inativo)
            @include('secoes.empresa')
        @endif
        @if($equipe && !$equipe->inativo)
            @include('secoes.equipe')
        @endif
        @if($contato && !$contato->inativo)
            @include('secoes.contato')
        @endif
        @if($redes_sociais && !$redes_sociais->inativo)
            @include('secoes.redes_sociais')
        @endif
    </main>
    <div id="preloader" style="background:{{$configuracao['cor']}};"></div>
@endsection