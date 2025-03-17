<form action="{{ route('experiences.store') }}" method="POST" id="experienceForm">
    @csrf
    <div class="row">
        <!-- Date Début -->
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="date_debut" class="block text-sm font-medium text-gray-700">Date Début *</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control @error('date_debut') is-invalid @enderror" value="{{ old('date_debut') }}" required>
                @error('date_debut')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Date Fin -->
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="date_fin" class="block text-sm font-medium text-gray-700">Date Fin *</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control @error('date_fin') is-invalid @enderror" value="{{ old('date_fin') }}" required>
                @error('date_fin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Poste -->
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="poste" class="block text-sm font-medium text-gray-700">Poste *</label>
                <input type="text" id="poste" name="poste" class="form-control @error('poste') is-invalid @enderror" value="{{ old('poste') }}" required>
                @error('poste')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Société -->
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="societe" class="block text-sm font-medium text-gray-700">Société *</label>
                <input type="text" id="societe" name="societe" class="form-control @error('societe') is-invalid @enderror" value="{{ old('societe') }}" required>
                @error('societe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Période -->
        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="periode" class="block text-sm font-medium text-gray-700">Période *</label>
                <input type="text" id="periode" name="periode" class="form-control @error('periode') is-invalid @enderror" value="{{ old('periode') }}" required>
                @error('periode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Champ caché pour id_candidat -->
        {{-- Champ caché pour l'ID Candidat --}}
        <input type="hidden" id="id_candidat" name="id_candidat" value="{{ request()->input('id_candidat') }}">


        {{-- Bouton de soumission --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
        </div>
    </div>
</form>

