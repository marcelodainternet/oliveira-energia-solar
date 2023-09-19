<?php

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

function arruma_imagem(UploadedFile $arquivoCarregado, $maximo)
{
    $imagem = Image::make($arquivoCarregado);

    if ($imagem->width() >= $imagem->height()) $imagem->resize($maximo, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    else $imagem->resize(null, $maximo, function ($constraint) {
        $constraint->aspectRatio();
    });

    return $imagem;
}

function salvar_imagem(mixed $imagemCarregada, string $nome = null)
{
    if ($imagemCarregada && $imagemCarregada instanceof UploadedFile) {
        $imagem = arruma_imagem($imagemCarregada, 800);
        $imagem->save(public_path("uploads/" . $nome . ".jpg"), 80);

        $imagem = arruma_imagem($imagemCarregada, 400);
        $imagem->save(public_path("uploads/" . $nome . "-thumbs.jpg"), 80);

        $imagem = arruma_imagem($imagemCarregada, 1600);
        $imagem->save(public_path("uploads/" . $nome . "-grande.jpg"), 80);
    } elseif ($imagemCarregada === null) {
        if (file_exists(public_path('uploads/' . $nome . '.jpg'))) unlink(public_path('uploads/' . $nome . '.jpg'));
        if (file_exists(public_path('uploads/' . $nome . '-thumbs.jpg'))) unlink(public_path('uploads/' . $nome . '-thumbs.jpg'));
        if (file_exists(public_path('uploads/' . $nome . '-grande.jpg'))) unlink(public_path('uploads/' . $nome . '-grande.jpg'));
    }
}
