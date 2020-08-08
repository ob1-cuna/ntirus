{{ $extensao = pathinfo(public_path($imagem->caminho), PATHINFO_EXTENSION) }}

@switch($extensao)
    @case ('jpeg')
    @case ('png')
    @case ('jpg')
    @case ('gif')
    @case ('svg')
    fa-file-image
    @break

    @case ('pdf')
    @case ('indd')
    fa-file-pdf
    @break

    @default
    fa-file
@endswitch