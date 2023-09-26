@extends("layout")
@section("head")
    <title>{{$configuracao['titulo']}}</title>
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
        @include('secoes.vitrine')
        @include('secoes.home')
        @include('secoes.vitrine2')
        @include('secoes.destaque')
        @include('secoes.vitrine3')
        @include('secoes.parceiros')
        @include('secoes.portfolio')
        @include('secoes.depoimentos')
        @include('secoes.empresa')
        @include('secoes.equipe')
        @include('secoes.contato')
        @include('secoes.redes_sociais')
    </main>
    <div id="preloader" style="background:{{$configuracao['cor']}};"></div>
@endsection