<!-- Connaissance Métier -->
<form action="{{ route('competences.store') }}" method="POST">
@csrf
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Connaissance Métier</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Agroalimentaire" id="agroalimentaire">
                    <label class="form-check-label" for="agroalimentaire">Agroalimentaire</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Automobile" id="automobile">
                    <label class="form-check-label" for="automobile">Automobile</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Banque & Assurance" id="banque">
                    <label class="form-check-label" for="banque">Banque & Assurance</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Chimie" id="chimie">
                    <label class="form-check-label" for="chimie">Chimie</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Distribution" id="distribution">
                    <label class="form-check-label" for="distribution">Distribution</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Equipement et services de location" id="equipement">
                    <label class="form-check-label" for="equipement">Equipement et services de location</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="High-Tech" id="high-tech">
                    <label class="form-check-label" for="high-tech">High-Tech</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Industrie de production" id="industrie-production">
                    <label class="form-check-label" for="industrie-production">Industrie de production</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Industrie hôtelière" id="industrie-hoteliere">
                    <label class="form-check-label" for="industrie-hoteliere">Industrie hôtelière</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Mode-Textile-Luxe" id="mode-textile-luxe">
                    <label class="form-check-label" for="mode-textile-luxe">Mode-Textile-Luxe</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Ressources Humaines" id="rh">
                    <label class="form-check-label" for="rh">Ressources Humaines</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Santé & Médical" id="sante">
                    <label class="form-check-label" for="sante">Santé & Médical</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Secteur public" id="secteur-public">
                    <label class="form-check-label" for="secteur-public">Secteur public</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Transport & Logistique" id="transport-logistique">
                    <label class="form-check-label" for="transport-logistique">Transport & Logistique</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Frameworks -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Frameworks</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="AngularJS" id="angularjs">
                    <label class="form-check-label" for="angularjs">AngularJS</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Asp.Net" id="aspnet">
                    <label class="form-check-label" for="aspnet">Asp.Net</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Bootstrap" id="bootstrap">
                    <label class="form-check-label" for="bootstrap">Bootstrap</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Hibernate" id="hibernate">
                    <label class="form-check-label" for="hibernate">Hibernate</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="JPA" id="jpa">
                    <label class="form-check-label" for="jpa">JPA</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Jquery" id="jquery">
                    <label class="form-check-label" for="jquery">Jquery</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="JSF" id="jsf">
                    <label class="form-check-label" for="jsf">JSF</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Spring" id="spring">
                    <label class="form-check-label" for="spring">Spring</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Symfony" id="symfony">
                    <label class="form-check-label" for="symfony">Symfony</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- IDE -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">IDE</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Android Studio" id="android-studio">
                    <label class="form-check-label" for="android-studio">Android Studio</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Eclips" id="eclips">
                    <label class="form-check-label" for="eclips">Eclips</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Netbeans" id="netbeans">
                    <label class="form-check-label" for="netbeans">Netbeans</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Visuel studio" id="visuel-studio">
                    <label class="form-check-label" for="visuel-studio">Visuel studio</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Langages Programmation -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Langages Programmation</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="C#" id="csharp">
                    <label class="form-check-label" for="csharp">C#</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="C/C++" id="c-cpp">
                    <label class="form-check-label" for="c-cpp">C/C++</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="CSS3" id="css3">
                    <label class="form-check-label" for="css3">CSS3</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="HTML 5" id="html5">
                    <label class="form-check-label" for="html5">HTML 5</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="JAVA/JEE" id="java-jee">
                    <label class="form-check-label" for="java-jee">JAVA/JEE</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Javascript" id="javascript">
                    <label class="form-check-label" for="javascript">Javascript</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="PHP5" id="php5">
                    <label class="form-check-label" for="php5">PHP5</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="VB.Net" id="vbnet">
                    <label class="form-check-label" for="vbnet">VB.Net</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="XML" id="xml">
                    <label class="form-check-label" for="xml">XML</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Méthodologies -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Méthodologies</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Agile, Scrum" id="agile-scrum">
                    <label class="form-check-label" for="agile-scrum">Agile, Scrum</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Outils Gestion Projet -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Outils Gestion Projet</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="GIT" id="git">
                    <label class="form-check-label" for="git">GIT</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Jenkins" id="jenkins">
                    <label class="form-check-label" for="jenkins">Jenkins</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Maven" id="maven">
                    <label class="form-check-label" for="maven">Maven</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Sonar" id="sonar">
                    <label class="form-check-label" for="sonar">Sonar</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="SVN" id="svn">
                    <label class="form-check-label" for="svn">SVN</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Plateforme Mobile -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Plateforme Mobile</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Android" id="android">
                    <label class="form-check-label" for="android">Android</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="IOS" id="ios">
                    <label class="form-check-label" for="ios">IOS</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Windows Mobile" id="windows-mobile">
                    <label class="form-check-label" for="windows-mobile">Windows Mobile</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Serveur Application -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Serveur Application</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Apache" id="apache">
                        <label class="form-check-label" for="apache">Apache</label>
                    </div>
                </div>
                <!-- Répétez pour les autres compétences -->
            </div>
        </div>
    </div>
</div>

<!-- SGBD -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">SGBD</h5>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Apache" id="apache">
                    <label class="form-check-label" for="apache">Apache</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="GlassFish" id="glassfish">
                    <label class="form-check-label" for="glassfish">GlassFish</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="IIS" id="iis">
                    <label class="form-check-label" for="iis">IIS</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="JIBOSS" id="jiboss">
                    <label class="form-check-label" for="jiboss">JIBOSS</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="TOMCAT" id="tomcat">
                    <label class="form-check-label" for="tomcat">TOMCAT</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="Websphere" id="websphere">
                    <label class="form-check-label" for="websphere">Websphere</label>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="competences[]" value="WildFly" id="wildfly">
                    <label class="form-check-label" for="wildfly">WildFly</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Compétences Linguistiques -->
<div class="col-12 mb-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Compétences Linguistiques</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Français" id="francais">
                        <label class="form-check-label" for="francais">Français</label>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Anglais" id="anglais">
                        <label class="form-check-label" for="anglais">Anglais</label>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Espagnol" id="espagnol">
                        <label class="form-check-label" for="espagnol">Espagnol</label>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Allemand" id="allemand">
                        <label class="form-check-label" for="allemand">Allemand</label>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="competences[]" value="Arabe" id="arabe">
                        <label class="form-check-label" for="arabe">Arabe</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="id_candidat" name="id_candidat" value="{{ request()->input('id_candidat') }}">

    <div class="col-12">
        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter</button>
    </div>
<script>
    // Récupérer l'id_candidat depuis l'URL
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const idCandidat = urlParams.get('id_candidat'); // Récupère la valeur de "id_candidat" depuis l'URL

        if (idCandidat) {
            // Remplir le champ caché avec la valeur de id_candidat
            document.getElementById('id_candidat').value = idCandidat;
        }
    });
</script>