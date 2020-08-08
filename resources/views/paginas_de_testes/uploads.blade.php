@foreach($imagems as $imagem)

    <li>
        <img src="{{ asset ($imagem->caminho) }}">
    </li>
    <li>
        {{ $imagem->nome_imagem }}.{{ pathinfo(public_path($imagem->caminho), PATHINFO_EXTENSION)}}
        {{ tamanhoParaHumanos(filesize(public_path($imagem->caminho))) }}
    </li>

@endforeach


<form enctype="multipart/form-data" method="post" action="{{ route('upload.store') }}">
    @csrf
    <fieldset>
        <div>
            <label for="file">Imagem: </label>
            <input name="file" id="file" type="file"/>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </fieldset>
</form>
