window.addEventListener("load", () => {
    let carregamentoDeImagens = document.querySelectorAll(".carregamento-de-imagem");
    carregamentoDeImagens.forEach((carregamentoDeImagem) => {

        carregamentoDeImagem.querySelector(".botao-excluir").addEventListener("click", () => {
            carregamentoDeImagem.querySelector("input[type='file']").value = "";
            carregamentoDeImagem.querySelector("input[type='hidden']").value = "";
            carregamentoDeImagem.querySelector("img").setAttribute("src", carregamentoDeImagem.getAttribute("data-fallback"));
            carregamentoDeImagem.querySelector(".botao-excluir").style.display = "none";
        });

        carregamentoDeImagem.querySelector("input[type='file']").addEventListener("change", () => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    carregamentoDeImagem.querySelector("img").setAttribute("src", e.target.result);
                    carregamentoDeImagem.querySelector(".botao-excluir").style.display = "block";
                }
                reader.readAsDataURL(file);
            }
        });
    });
});