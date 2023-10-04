<div class="carregamento-de-imagem" data-fallback="{{$fallback}}" style="position: relative; display:inline-block;">
    <label for="f{{$name}}">
      <img class="img-thumbnail" style="width: 225px; height: 150px; object-fit:contain;" src="{{isset($path) && file_exists(public_path($path))?asset($path)."?".time():$fallback}}" alt="Imagem Principal" title="Imagem Principal">
    </label>
    <button type="button" style="display: {{isset($path) && file_exists(public_path($path))?'block':'none'}}; position: absolute; right: 1px; top: 1px; padding: 2px; background: #fff; border: 1px solid #ddd; border-width: 0 0 1px 1px; border-radius: 0 0 0 5px; line-height: 1;" class="text-danger botao-excluir">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg>
    </button>
    <input type="hidden" name="{{$name}}" value="{{isset($path) && file_exists(public_path($path))?public_path($path):''}}">
    <input class="hidden" style="vertical-align:middle;" name="{{$name}}" type="file" id="f{{$name}}"/>
</div>