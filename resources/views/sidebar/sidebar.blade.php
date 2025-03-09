<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="menu-list">
                <!-- Gestion des Candidats -->
                <li class="submenu">
                    <a href="#"><span>👥 Gestion des Candidats</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('candidat/add/page') }}">➕ Ajouter un nouveau candidat</a></li>
                        <li><a href="{{ route('candidat/list') }}">📋 Consulter la liste des candidats</a></li>
                        <li><a href="{{ route('candidat/suivie') }}">📌 Suivre l'avancement</a></li>
                    </ul>
                </li>

                <!-- Processus de Recrutement -->
                <li class="submenu">
                    <a href="#"><span>📈 Processus de Recrutement</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('entretiens.index') }}">📅 Planifier un entretien</a></li>
                        <li><a href="{{ route('feedbacks.index') }}">📝 Gérer les feedbacks</a></li>
                        <li><a href="#">📊 Analyser les résultats</a></li>
                    </ul>
                </li>

                <!-- Intelligence Artificielle -->
                <li class="submenu">
                    <a href="#"><span>🤖 Outils IA</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">🎮 Entretiens virtuels</a></li>
                        <li><a href="#">🔮 Analyse prédictive</a></li>
                        <li><a href="#">📊 Évaluation automatique</a></li>
                    </ul>
                </li>

                <!-- Besoins et Planification -->
                <li class="submenu">
                    <a href="#"><span>📋 Gestion des Besoins</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">💼 Créer un besoin</a></li>
                        <li><a href="#">📊 Consulter les besoins</a></li>
                        <li><a href="#">📈 Suivi budgétaire</a></li>
                    </ul>
                </li>

                <!-- Configuration -->
                <li class="submenu">
                    <a href="#"><span>⚙️ Configuration</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('motifs.index') }}">📑 Paramètres généraux</a></li>
                        <li><a href="{{ route('competences.type') }}">🛠️ Gestion des compétences</a></li>
                        <li><a href="{{ route('evaluations.index') }}">✅ Configuration des évaluations</a></li>
                    </ul>
                </li>

                <!-- Outils de Productivité -->
                <li class="submenu">
                    <a href="#"><span>📅 Outils de Productivité</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📅 Calendrier</a></li>
                        <li><a href="#">🔔 Notifications</a></li>
                        <li><a href="#">📋 Dossiers en cours</a></li>
                    </ul>
                </li>

                <!-- Analytiques -->
                <li class="submenu">
                    <a href="#"><span>📊 Analytiques</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📈 Performances</a></li>
                        <li><a href="#">📊 Statistiques</a></li>
                        <li><a href="#">📑 Rapports</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>