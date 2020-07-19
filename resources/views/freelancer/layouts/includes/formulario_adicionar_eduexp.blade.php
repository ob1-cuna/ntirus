<fieldset>
    <div class="position-relative form-group">
        <input type="hidden" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ Auth::user()->id }}" required>
        <input type="hidden" name="tipo" id="tipo" class="form-control @error('tipo')is-invalid @enderror"  value="{{ $categoria }}" required>
        <label for="instituicao" class="">Instituição</label>
        <input type="text" name="instituicao" id="instituicao" class="form-control @error('instituicao') is-invalid @enderror" value="{{ old('instituicao') }}" required autocomplete="off">
        @error('instituicao')
        <span class="invalid-feedback" role="alert">
				    <strong>{{ $message }}</strong>
			    </span>
        @enderror
        @error('user_id')
        <span class="invalid-feedback" role="alert">
				    <strong>{{ $message }}</strong>
			    </span>
        @enderror
        @error('tipo')
        <span class="invalid-feedback" role="alert">
				    <strong>{{ $message }}</strong>
			    </span>
        @enderror
    </div>
    <div class="position-relative form-group">
        <label for="nome">{{ $ocupacao }}</label>
        <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old ('nome')}}" required autocomplete="off">
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="position-relative form-group">
            <label for="data_inicio">Data de Inicio</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" value="{{ old('data_inicio')}}" required autocomplete="off">
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative form-group">
            <label for="data_terminio">Data Terminio</label>
            <input type="date" name="data_terminio" id="data_terminio" class="form-control @error('data_terminio') is-invalid @enderror" value="{{ old('data_terminio') }}" autocomplete="off">
            <span>* Deixe em branco se é o actual</span>
            </div>
        </div>
    </div>
    <div class="position-relative form-group">
        <label for="descricao">Descricao das Actividades</label>
        <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" required>{{ old ('descricao')}}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn-wide mb-3 mr-2 btn-icon btn btn-primary btn-lg">Salvar</button>
    </div>
</fieldset>
