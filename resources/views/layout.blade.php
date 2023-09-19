<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include("includes.meta")

    @yield("head")
</head>
<body>
    @include("includes.topbar")

    @include("includes.cabecalho")

    @yield("content")

    @include('includes.rodape')

    <div id="preloader" style="background:{{$configuracao['cor']}};"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        var purecookieTitle = "Cookies.",
        purecookieDesc = "<?php echo $configuracao['info'] ?>",
        purecookieLink = '<a href="./cookies.php" target="_blank"> Ver Política de Cookies?</a>',
        purecookieButton = "Aceitar";

        function pureFadeIn(e, o) {
        var i = document.getElementById(e);
        i.style.opacity = 0, i.style.display = o || "block",
            function e() {
            var o = parseFloat(i.style.opacity);
            (o += .02) > 1 || (i.style.opacity = o, requestAnimationFrame(e))
            }()
        }

        function pureFadeOut(e) {
        var o = document.getElementById(e);
        o.style.opacity = 1,
            function e() {
            (o.style.opacity -= .02) < 0 ? o.style.display = "none" : requestAnimationFrame(e)
            }()
        }

        function setCookie(e, o, i) {
        var t = "";
        if (i) {
            var n = new Date;
            n.setTime(n.getTime() + 24 * i * 60 * 60 * 1e3), t = "; expires=" + n.toUTCString()
        }
        document.cookie = e + "=" + (o || "") + t + "; path=/"
        }

        function getCookie(e) {
        for (var o = e + "=", i = document.cookie.split(";"), t = 0; t < i.length; t++) {
            for (var n = i[t];
            " " == n.charAt(0);) n = n.substring(1, n.length);
            if (0 == n.indexOf(o)) return n.substring(o.length, n.length)
        }
        return null
        }

        function eraseCookie(e) {
        document.cookie = e + "=; Max-Age=-99999999;"
        }

        function cookieConsent() {
        getCookie("purecookieDismiss") || (document.body.innerHTML += '<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>' + purecookieTitle + '</a></div><div class="cookieDesc"><p>' + purecookieDesc + " " + purecookieLink + '</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">' + purecookieButton + "</a></div></div>", pureFadeIn("cookieConsentContainer"))
        }

        function purecookieDismiss() {
        setCookie("purecookieDismiss", "1", 7), pureFadeOut("cookieConsentContainer")
        }
        window.onload = function() {
        cookieConsent()
        };
    </script>
</body>

</html>