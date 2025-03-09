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
                        <li><a href="#">📂 Mes Candidats</a></li>
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

                <!-- Facturation -->
                <li class="submenu">
                    <a href="#"><span>💳 Facturation</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📜 Bon de Commande</a></li>
                        <li><a href="#">📦 Bon de Livraison</a></li>
                        <li><a href="#">📑 Facture de Vente</a></li>
                        <li><a href="#">📄 Facture Proforma</a></li>
                        <li><a href="#">❌ Factures Non Réglées</a></li>
                        <li><a href="#">💰 Règlement Client</a></li>
                    </ul>
                </li>

                <!-- Expression de besoin -->
                <li class="submenu">
                    <a href="#"><span>📝 Expression de besoin</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">💵 Alimentation Trésorerie</a></li>
                        <li><a href="#">📑 Consulter Besoins</a></li>
                        <li><a href="#">📋 Liste Besoins</a></li>
                        <li><a href="#">💸 Liste Dépenses</a></li>
                        <li><a href="#">✅ Mes Besoins Affectés</a></li>
                        <li><a href="#">💰 Solde Trésorerie</a></li>
                    </ul>
                </li>
                <!-- Paramétrage RH -->
                <li class="submenu">
                    <a href="#"><span>⚙️ Paramétrage RH</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('motifs.index') }}">📑 Affectation Motif</a></li>
                        <li><a href="{{ route('affectations.index') }}">📌 Affectation Clôture</a></li>
                        <li><a href="{{ route('competences.type') }}">🛠️ Type Compétences</a></li>
                        <li><a href="{{ route('competence_types.index') }}">💡 Compétences</a></li>
                        <li><a href="{{ route('entretiens.index') }}">✅ Avis Évaluation</a></li>
                        <li><a href="{{ route('compagnes.index') }}">📢 Campagne recrutement</a></li>
                        <li><a href="{{ route('source.index') }}">📂 Source CV</a></li>
                        <li><a href="{{ route('categories.index') }}">🏢 Catégorie emploi</a></li>
                        <li><a href="{{ route('decisions.index') }}">📋 Décision Clôture</a></li>
                        <li><a href="#">🔄 Motif Transfère</a></li>
                    </ul>
                </li>

                <!-- Paramétrage Comm -->
                <li class="submenu">
                    <a href="#"><span>⚙️ Paramétrage Comm</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">📌 Activité Client</a></li>
                        <li><a href="#">📦 Articles</a></li>
                        <li><a href="#">📂 Catégorie Article</a></li>
                        <li><a href="#">👥 Clients</a></li>
                        <li><a href="#">📊 Famille Article</a></li>
                        <li><a href="#">📇 Fonction Contact Client</a></li>
                        <li><a href="#">📆 Fréquence Facturation</a></li>
                        <li><a href="#">🛒 Groupe Article</a></li>
                        <li><a href="#">👨‍👩‍👧 Groupe Client</a></li>
                        <li><a href="#">💲 Groupe TVA</a></li>
                        <li><a href="#">💰 Trésorerie</a></li>
                        <li><a href="#">📦 Type Article</a></li>
                        <li><a href="#">📇 Type Contact</a></li>
                        <li><a href="#">🎤 Type Entretien</a></li>
                    </ul>
                </li>

                <!-- Autres Sections -->
                <li><a href="{{ route('calendar.index') }}"><span>📅 Calendrier</span></a></li>
                <li><a href="#"><span>📂 Mes Dossiers En Cours</span></a></li>
                <li><a href="#"><span>📊 Évaluation</span></a></li>
                <li><a href="#"><span>📦 Clôture</span></a></li>
            </ul>
        </div>
    </div>
</div>
