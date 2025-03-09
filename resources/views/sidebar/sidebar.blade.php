
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="menu-list">

                <!-- Tableau de Bord -->
                <li class="submenu">
                    <a href="{{ route('/home') }}"><span>📊 Tableau de Bord</span><span class="menu-arrow"></span></a>
                </li>
                <!-- Gestion des Utilisateurs -->
                <li class="submenu">
                    <a href="#"><span>👥 Gestion des Utilisateurs</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('candidat/add/page') }}">➕ Ajouter un candidat</a></li>
                        <li><a href="{{ route('candidat/list') }}">📋 Liste des candidats</a></li>
                        <li><a href="{{ route('candidat/suivie') }}">📌 Suivi des candidats</a></li>
                        <li><a href="">👔 Gestion des recruteurs</a></li>
                        <li><a href="">🛠️ Gestion des administrateurs</a></li>
                    </ul>
                </li>

                <!-- Gestion des Entretiens -->
                <li class="submenu">
                    <a href="#"><span>📅 Gestion des Entretiens</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('entretiens.index') }}">📅 Entretiens programmés</a></li>
                        <li><a href="">➕ Planifier un entretien</a></li>
                        <li><a href="{{ route('feedbacks.index') }}">📝 Feedbacks et évaluations</a></li>
                        <li><a href="#">📊 Historique des entretiens</a></li>
                    </ul>
                </li>

                <!-- Génération des Questions -->
                <li class="submenu">
                    <a href="#"><span>🤖 Génération des Questions</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📌 Générer des questions IA</a></li>
                        <li><a href="#">🔍 Historique des questions</a></li>
                        <li><a href="#">⚙️ Personnalisation des questions</a></li>
                    </ul>
                </li>

                <!-- Résultats & Évaluations -->
                <li class="submenu">
                    <a href="#"><span>🎯 Résultats & Évaluations</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📊 Statistiques des candidats</a></li>
                        <li><a href="#">🏆 Classements & performances</a></li>
                        <li><a href="#">📜 Rapports analytiques</a></li>
                    </ul>
                </li>

                <!-- Gestion des Offres d’Emploi -->
                <li class="submenu">
                    <a href="#"><span>💼 Gestion des Offres</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">➕ Ajouter une offre</a></li>
                        <li><a href="#">📋 Liste des offres</a></li>
                        <li><a href="#">📌 Suivi des candidatures</a></li>
                    </ul>
                </li>

                <!-- Rapports & Exportation -->
                <li class="submenu">
                    <a href="#"><span>📂 Rapports & Exportation</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📜 Générer un rapport</a></li>
                        <li><a href="#">📥 Exporter les résultats</a></li>
                    </ul>
                </li>

                <!-- Configuration & Paramètres -->
                <li class="submenu">
                    <a href="#"><span>⚙️ Configuration</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('motifs.index') }}">📑 Paramètres généraux</a></li>
                        <li><a href="{{ route('competences.type') }}">🛠️ Gestion des compétences</a></li>
                        <li><a href="{{ route('evaluations.index') }}">✅ Configuration des évaluations</a></li>
                        <li><a href="#">🔔 Paramètres des notifications</a></li>
                    </ul>
                </li>

                <!-- Outils de Productivité -->
                <li class="submenu">
                    <a href="#"><span>📅 Outils de Productivité</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('calendar.index') }}">📅 Calendrier</a></li>
                        <li><a href="#">📋 Dossiers en cours</a></li>
                    </ul>
                </li>

                <!-- Analytiques -->
                <li class="submenu">
                    <a href="#"><span>📊 Analytiques</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📈 Performances globales</a></li>
                        <li><a href="#">📊 Statistiques détaillées</a></li>
                    </ul>
                </li>

                <!-- Support & Aide -->
                <li class="submenu">
                    <a href="#"><span>🛠️ Support & Aide</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📖 FAQ & Documentation</a></li>
                        <li><a href="#">📞 Contacter le support</a></li>
                        <li><a href="#">📋 Logs et erreurs</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
