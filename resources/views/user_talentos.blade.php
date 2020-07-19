<html>
<head>
    <title>Multiselect Dropdown With Checkbox In Laravel - nicesnippets.com </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-info">
<br /><br />
<div class="container" style="width:600px;">
    <form method="post" id="habilidades_form" action="{{ route('teste.store') }}">
        @csrf
        <div class="form-group">
            <label>Habilidades para o trabalho</label>
            <select id="habilidades" name="habilidade_id[]" multiple class="form-control" >
                @foreach($habilidades as $habilidade)
                    <option value="{{ $habilidade->id }}">{{ $habilidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-info" name="submit" value="Submit" />
        </div>
    </form>
    <br />
</div>
</body>
<script>
    $(document).ready(function(){
        $('#habilidades').multiselect({
            nonSelectedText: 'Selecione habilidades',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px'
        });
    });
</script>
</html>