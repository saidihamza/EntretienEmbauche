<form action="{{ route('candidat/add/save') }}" method="POST" enctype="multipart/form-data" id="informationsForm">
    @csrf
    <div class="row">
        <div class="col-12">
            <h5 class="form-title candidat-info text-xl font-semibold text-gray-700">Informations sur le Candidat
                <span>
                    <a href="javascript:;"></a>
                </span>
            </h5>
        </div>
        {{-- catégorie --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Choisir une catégorie<span class="text-red-500">*</span></label>
                <select class="form-control select @error('categorie') is-invalid @enderror" name="categorie" required>
                    <option selected disabled>Sélectionnez une catégorie</option>
                    <option value="Ingénieur Développement" {{ old('categorie') == 'Ingénieur Développement' ? "selected" : "" }}>Ingénieur Développement</option>
                    <option value="Consultant Support" {{ old('categorie') == 'Consultant Support' ? "selected" : "" }}>Consultant Support</option>
                    <option value="Assistance & Commerciale" {{ old('categorie') == 'Assistance & Commerciale' ? "selected" : "" }}>Assistance & Commerciale</option>
                    <option value="RH" {{ old('categorie') == 'RH' ? "selected" : "" }}>RH</option>
                    <option value="Ingénieur réseau et système" {{ old('categorie') == 'Ingénieur réseau et système' ? "selected" : "" }}>Ingénieur réseau et système</option>
                    <option value="Conseiller(e) aux admissions" {{ old('categorie') == 'Conseiller(e) aux admissions' ? "selected" : "" }}>Conseiller(e) aux admissions</option>
                    <option value="Admissions" {{ old('categorie') == 'Admissions' ? "selected" : "" }}>Admissions</option>
                    <option value="Commercial(e)" {{ old('categorie') == 'Commercial(e)' ? "selected" : "" }}>Commercial(e)</option>
                    <option value="Marketing" {{ old('categorie') == 'Marketing' ? "selected" : "" }}>Marketing</option>
                    <option value="Technicien informatique" {{ old('categorie') == 'Technicien informatique' ? "selected" : "" }}>Technicien informatique</option>
                    <option value="Community Manager" {{ old('categorie') == 'Community Manager' ? "selected" : "" }}>Community Manager</option>
                    <option value="Graphic Designer" {{ old('categorie') == 'Graphic Designer' ? "selected" : "" }}>Graphic Designer</option>
                </select>
                @error('categorie')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Source CV --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Source CV</label>
                <select class="form-control select @error('cv_source') is-invalid @enderror" name="cv_source">
                    <option selected disabled>Sélectionnez la source du CV</option>
                    <option value="TanitJob - Opensilog" {{ old('cv_source') == 'TanitJob - Opensilog' ? "selected" :""}}>TanitJob - Opensilog</option>
                    <option value="Jobi" {{ old('cv_source') == 'Jobi' ? "selected" :""}}>Jobi</option>
                    <option value="LinkedIn" {{ old('cv_source') == 'LinkedIn - Ines' ? "selected" :""}}>LinkedIn</option>
                    <option value="Trun over IT" {{ old('cv_source') == 'Trun over IT' ? "selected" :""}}>Trun over IT</option>
                    <option value="Recommandation" {{ old('cv_source') == 'Recommandation' ? "selected" :""}}>Recommandation</option>
                    <option value="Candidature spontanée" {{ old('cv_source') == 'Candidature spontanée' ? "selected" :""}}>Candidature spontanée</option>
                    <option value="Keejob" {{ old('cv_source') == 'Keejob- Digilinks' ? "selected" :""}}>Keejob</option>
                    <option value="Site Digilinks" {{ old('cv_source') == 'Site Digilinks' ? "selected" :""}}>Site Digilinks</option>
                </select>
                @error('cv_source')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Candidat  --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Candidat  <span class="text-red-500">*</span></label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Entrez le prénom" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Date de naissance --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms calendar-icon">
                <label class="block text-sm font-medium text-gray-700">Date de naissance <span class="text-red-500">*</span></label>
                <input class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" type="text" placeholder="JJ-MM-AAAA" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Email --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">E-Mail <span class="text-red-500">*</span></label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Entrez l'adresse e-mail" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Téléphone --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" name="phone_number" placeholder="Entrez le numéro de téléphone" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Sexe --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Sexe <span class="text-red-500">*</span></label>
                <select class="form-control select @error('gender') is-invalid @enderror" name="gender" required>
                    <option selected disabled>Sélectionnez le sexe</option>
                    <option value="Female" {{ old('gender') == 'Female' ? "selected" :""}}>Femme</option>
                    <option value="Male" {{ old('gender') == 'Male' ? "selected" :""}}>Homme</option>
                    <option value="Others" {{ old('gender') == 'Others' ? "selected" :""}}>Autres</option>
                </select>
                @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Etat Civil --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Etat Civil <span class="text-red-500">*</span></label>
                <select class="form-control select @error('marital_status') is-invalid @enderror" name="marital_status" required>
                    <option selected disabled>Sélectionnez l'état civil</option>
                    <option value="Single" {{ old('marital_status') == 'Single' ? "selected" :""}}>Célibataire</option>
                    <option value="Married" {{ old('marital_status') == 'Married' ? "selected" :""}}>Marié(e)</option>
                    <option value="Divorced" {{ old('marital_status') == 'Divorced' ? "selected" :""}}>Divorcé(e)</option>
                </select>
                @error('marital_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Motorisé --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Motorisé <span class="text-red-500">*</span></label>
                <select class="form-control select @error('motorized') is-invalid @enderror" name="motorized" required>
                    <option selected disabled>Sélectionnez</option>
                    <option value="Yes" {{ old('motorized') == 'Yes' ? "selected" :""}}>Oui</option>
                    <option value="No" {{ old('motorized') == 'No' ? "selected" :""}}>Non</option>
                </select>
                @error('motorized')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Permis de conduire --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Permis de conduire <span class="text-red-500">*</span></label>
                <select class="form-control select @error('has_driving_license') is-invalid @enderror" name="has_driving_license" required>
                    <option selected disabled>Sélectionnez</option>
                    <option value="Yes" {{ old('has_driving_license') == 'Yes' ? "selected" :""}}>Oui</option>
                    <option value="No" {{ old('has_driving_license') == 'No' ? "selected" :""}}>Non</option>
                </select>
                @error('has_driving_license')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Visa --}}
        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Visa <span class="text-red-500">*</span></label>
                <select class="form-control select @error('has_visa') is-invalid @enderror" name="has_visa" required>
                    <option selected disabled>Sélectionnez</option>
                    <option value="Yes" {{ old('has_visa') == 'Yes' ? "selected" :""}}>Oui</option>
                    <option value="No" {{ old('has_visa') == 'No' ? "selected" :""}}>Non</option>
                </select>
                @error('has_visa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- CV --}}
        <div class="col-12">
            <div class="form-group candidats-up-files">
                <label class="file-upload image-upbtn mb-0 @error('cv_upload') is-invalid @enderror">
                    <input type="file" name="cv_upload" required>
                </label>
                @error('cv_upload')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- Commentaire --}}
        <div class="col-12">
            <div class="form-group local-forms">
                <label class="block text-sm font-medium text-gray-700">Commentaire</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" rows="4">{{ old('comment') }}</textarea>
                @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- Soumettre --}}
        <div class="col-12">
            <div class="candidat-submit">
                <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
            </div>
        </div>

    </div>
</form>