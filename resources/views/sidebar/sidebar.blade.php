<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="menu-list">

                <!-- Candidats -->
                <li class="submenu">
                    <a href="#"><span>👥 Candidats</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('candidat/add/page') }}">➕ Ajouter Candidat</a></li>
                        <li><a href="{{ route('candidat/list') }}">📋 Liste des candidats</a></li>
                        <li><a href="{{ route('candidat/suivie') }}">📌 Suivi Candidat</a></li>
                    </ul>
                </li>

                <!-- Avis -->
                <li class="submenu">
                    <a href="#"><span>💬 Avis</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('avis/attente') }}">⏳ Mes avis en attente</a></li>
                        <li><a href="{{ route('avis/list/page') }}">🗂️ Avis</a></li>
                    </ul>
                </li>

                <!-- Expression de besoin -->
                <li class="submenu">
                    <a href="#"><span>📝 Expression de besoin</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📑 Consulter Besoins</a></li>
                        <li><a href="#">📋 Liste Besoins</a></li>
                        <li><a href="#">✅ Mes Besoins Affectés</a></li>
                    </ul>
                </li>

                <!-- Paramétrage RH -->
                <li class="submenu">
                    <a href="#"><span>⚙️ Paramétrage RH</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('motifs.index') }}">📑 Affectation Motif</a></li>
                        <li><a href="{{ route('competences.type') }}">🛠️ Type Compétences</a></li>
                        <li><a href="{{ route('competence_types.index') }}">💡 Compétences</a></li>
                        <li><a href="{{ route('entretiens.index') }}">✅ Avis Évaluation</a></li>
                        <li><a href="{{ route('compagnes.index') }}">📢 Campagne recrutement</a></li>
                        <li><a href="{{ route('source.index') }}">📂 Source CV</a></li>
                        <li><a href="{{ route('categories.index') }}">🏢 Catégorie emploi</a></li>
                        <li><a href="{{ route('decisions.index') }}">📋 Décision Clôture</a></li>
                    </ul>
                </li>

                <!-- Gestion des Employés -->
                <li class="submenu">
                    <a href="#"><span>👨‍💼 Employés</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="">👤 Liste des employés</a></li>
                        <li><a href="">➕ Ajouter Employé</a></li>
                        <li><a href="">💸 Gestion des salaires</a></li>
                        <li><a href="">📊 Suivi des performances</a></li>
                    </ul>
                </li>

                <!-- IA Évaluation -->
                <li class="submenu">
                    <a href="#"><span>🤖 IA Évaluation</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">🎥 Analyser entretien vidéo</a></li>
                        <li><a href="#">💡 Synthèse des compétences</a></li>
                        <li><a href="#">🔍 Comparaison automatique</a></li>
                    </ul>
                </li>

                <!-- IA Sélection -->
                <li class="submenu">
                    <a href="#"><span>🧠 IA Sélection</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">🔮 Prédiction de la performance future</a></li>
                        <li><a href="#">💼 Recommandation des candidats</a></li>
                    </ul>
                </li>

                <!-- IA Administration -->
                <li class="submenu">
                    <a href="#"><span>⚙️ IA Administration</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📄 Tri automatique des CV</a></li>
                        <li><a href="#">📅 Planification automatique</a></li>
                    </ul>
                </li>

                <!-- Rapports et Analyses -->
                <li class="submenu">
                    <a href="#"><span>📊 Rapports</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📈 Rapport Recrutement</a></li>
                        <li><a href="#">📉 Rapport Performance</a></li>
                    </ul>
                </li>

                <!-- Autres Sections -->
                <li><a href="{{ route('calendar.index') }}"><span>📅 Calendrier</span></a></li>
                <li><a href="#"><span>📂 Mes Dossiers En Cours</span></a></li>
                <li><a href="#"><span>📦 Clôture</span></a></li>
            </ul>
        </div>
    </div>
</div>
