<form action="{{ route('formation.store') }}" method="POST" id="formationForm">
    @csrf
    <div class="row">
        {{-- Diplôme --}}
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="diplome" class="block text-sm font-medium text-gray-700">Diplôme *</label>
                <select id="diplome" name="diplome" class="form-control @error('diplome') is-invalid @enderror" required>
                    <option value="">Sélectionner un diplôme</option>
                    <option value="Bac" {{ old('diplome') == 'Bac' ? 'selected' : '' }}>Bac</option>
                    <option value="Bac+2" {{ old('diplome') == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                    <option value="Licence" {{ old('diplome') == 'Licence' ? 'selected' : '' }}>Licence</option>
                    <option value="Master" {{ old('diplome') == 'Master' ? 'selected' : '' }}>Master</option>
                    <option value="Ingénieur" {{ old('diplome') == 'Ingénieur' ? 'selected' : '' }}>Ingénieur</option>
                    <option value="BTS" {{ old('diplome') == 'BTS' ? 'selected' : '' }}>BTS</option>
                    <option value="DESS" {{ old('diplome') == 'DESS' ? 'selected' : '' }}>DESS</option>
                    <option value="DEA" {{ old('diplome') == 'DEA' ? 'selected' : '' }}>DEA</option>
                </select>
                @error('diplome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Formation --}}
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="formation" class="block text-sm font-medium text-gray-700">Formation *</label>
                <input type="text" id="formation" name="formation" class="form-control @error('formation') is-invalid @enderror" value="{{ old('formation') }}" required>
                @error('formation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Université --}}
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="universite" class="block text-sm font-medium text-gray-700">Université *</label>
                <input type="text" id="universite" name="universite" class="form-control @error('universite') is-invalid @enderror" value="{{ old('universite') }}" required>
                @error('universite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Année d'obtention --}}
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="annee_obtention" class="block text-sm font-medium text-gray-700">Année d'obtention *</label>
                <input type="number" id="annee_obtention" name="annee_obtention" class="form-control @error('annee_obtention') is-invalid @enderror" value="{{ old('annee_obtention') }}" required>
                @error('annee_obtention')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Bouton de soumission --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
        </div>
    </div>
</form>

@if(session('success'))
    <script>
        toastr.success("{{ session('success') }}", "Succès", {timeOut: 5000});
    </script>
@endif

@if(session('error'))
    <script>
        toastr.error("{{ session('error') }}", "Erreur", {timeOut: 5000});
    </script>
@endif
