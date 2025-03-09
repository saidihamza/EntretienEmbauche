<form action="{{ route('competences.update', $candidat->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indique que c'est une requête de mise à jour -->

    <!-- Compétences Métier -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Compétences Métier</legend>
            <div class="row">
                @foreach(['agroalimentaire', 'automobile', 'banque_assurance', 'chimie', 'distribution', 'equipement_services_location', 'high_tech', 'industrie_production', 'industrie_hoteliere', 'mode_textile_luxe', 'ressources_humaines', 'sante_medical', 'secteur_public', 'transport_logistique'] as $competence)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="competences_metier[]" value="{{ $competence }}" id="competence_{{ $competence }}"
                                {{ in_array($competence, $candidat->competences_metier ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="competence_{{ $competence }}">
                                {{ ucfirst(str_replace('_', ' ', $competence)) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Frameworks -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Frameworks</legend>
            <div class="row">
                @foreach(['angularjs', 'asp_net', 'bootstrap', 'hibernate', 'jpa', 'jquery', 'jsf', 'spring', 'symfony'] as $framework)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="frameworks[]" value="{{ $framework }}" id="framework_{{ $framework }}"
                                {{ in_array($framework, $candidat->frameworks ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="framework_{{ $framework }}">
                                {{ ucfirst($framework) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- IDE -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">IDE</legend>
            <div class="row">
                @foreach(['android_studio', 'eclips', 'netbeans', 'visual_studio'] as $ide)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ide[]" value="{{ $ide }}" id="ide_{{ $ide }}"
                                {{ in_array($ide, $candidat->ide ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="ide_{{ $ide }}">
                                {{ ucfirst(str_replace('_', ' ', $ide)) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Langages de Programmation -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Langages de Programmation</legend>
            <div class="row">
                @foreach(['c_sharp', 'c_cpp', 'css3', 'html5', 'java_jee', 'javascript', 'php5', 'vb_net', 'xml'] as $langage)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="langages_programmation[]" value="{{ $langage }}" id="langage_{{ $langage }}"
                                {{ in_array($langage, $candidat->langages_programmation ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="langage_{{ $langage }}">
                                {{ ucfirst(str_replace('_', ' ', $langage)) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Méthodologies -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Méthodologies</legend>
            <div class="row">
                @foreach(['agile_scrum'] as $methodologie)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="methodologies[]" value="{{ $methodologie }}" id="methodologie_{{ $methodologie }}"
                                {{ in_array($methodologie, $candidat->methodologies ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="methodologie_{{ $methodologie }}">
                                {{ ucfirst(str_replace('_', ' ', $methodologie)) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Outils de Gestion de Projet -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Outils de Gestion de Projet</legend>
            <div class="row">
                @foreach(['git', 'jenkins', 'maven', 'sonar', 'svn'] as $outil)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="outils_gestion_projet[]" value="{{ $outil }}" id="outil_{{ $outil }}"
                                {{ in_array($outil, $candidat->outils_gestion_projet ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="outil_{{ $outil }}">
                                {{ ucfirst($outil) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Plateformes Mobiles -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Plateformes Mobiles</legend>
            <div class="row">
                @foreach(['android', 'ios', 'windows_mobile'] as $plateforme)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="plateforme_mobile[]" value="{{ $plateforme }}" id="plateforme_{{ $plateforme }}"
                                {{ in_array($plateforme, $candidat->plateforme_mobile ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="plateforme_{{ $plateforme }}">
                                {{ ucfirst($plateforme) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Serveur d'Application -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Serveur d'Application</legend>
            <div class="row">
                @foreach(['apache', 'glassfish', 'iis', 'jiboss', 'tomcat', 'websphere', 'wildfly'] as $serveur)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="serveur_application[]" value="{{ $serveur }}" id="serveur_{{ $serveur }}"
                                {{ in_array($serveur, $candidat->serveur_application ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="serveur_{{ $serveur }}">
                                {{ ucfirst($serveur) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- SGBD -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">SGBD</legend>
            <div class="row">
                @foreach(['mysql', 'oracle', 'postgresql', 'progress', 'sql_server'] as $sgbd)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sgbd[]" value="{{ $sgbd }}" id="sgbd_{{ $sgbd }}"
                                {{ in_array($sgbd, $candidat->sgbd ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sgbd_{{ $sgbd }}">
                                {{ ucfirst($sgbd) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Compétences Linguistiques -->
    <div class="mb-4">
        <fieldset>
            <legend class="form-label fw-bold text-xl font-semibold text-gray-700">Compétences Linguistiques</legend>
            <div class="row">
                @foreach(['anglais', 'francais'] as $langue)
                    <div class="col-md-4 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="competences_linguistiques[]" value="{{ $langue }}" id="langue_{{ $langue }}"
                                {{ in_array($langue, $candidat->competences_linguistiques ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label" for="langue_{{ $langue }}">
                                {{ ucfirst($langue) }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>

    <!-- Bouton de soumission -->
    <div class="candidat-submit">
        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
    </div>
</form>