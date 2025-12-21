<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Mes Rendez-vous</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #1a73e8;
            --primary-light: #e8f0fe;
            --secondary: #34a853;
            --accent: #fbbc05;
            --danger: #ea4335;
            --dark: #202124;
            --light: #f8f9fa;
            --gray: #5f6368;
            --gray-light: #dadce0;
            --sidebar-width: 260px;
            --header-height: 70px;
            --radius: 16px;
            --shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles (identique au dashboard) */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, #0d47a1 100%);
            color: white;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .sidebar-header h1 i {
            font-size: 1.8rem;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .menu-section {
            margin-bottom: 20px;
        }

        .menu-title {
            font-size: 0.8rem;
            text-transform: uppercase;
            padding: 10px 20px;
            color: rgba(255, 255, 255, 0.7);
            letter-spacing: 1px;
        }

        .menu-items {
            list-style: none;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            text-decoration: none;
            color: white;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 3px solid var(--accent);
        }

        .menu-item i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar (identique au dashboard) */
        .navbar {
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-left h2 {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.4rem;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
        }

        .emergency-btn {
            background-color: var(--danger);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .emergency-btn:hover {
            background-color: #c23321;
            transform: scale(1.05);
        }

        .emergency-btn i {
            font-size: 1.1rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 30px;
            transition: all 0.2s;
            position: relative;
        }

        .user-profile:hover {
            background-color: var(--primary-light);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 200px;
            padding: 10px 0;
            z-index: 1000;
            display: none;
        }

        .dropdown-menu.active {
            display: block;
        }

        .dropdown-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            color: var(--dark);
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            color: var(--gray);
        }

        /* Content Area */
        .content {
            padding: 30px;
            flex: 1;
        }

        /* Search Section */
        .search-section {
            background: white;
            padding: 2rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            border: 1px solid var(--gray-light);
        }

        .search-container {
            position: relative;
        }

        .search-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-title i {
            color: var(--primary);
        }

        .search-box {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid var(--gray-light);
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            list-style: none;
            display: none;
            margin-top: -1px;
        }

        .result-item {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .result-item:hover {
            background-color: var(--primary-light);
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item strong {
            display: block;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .result-item small {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .no-result {
            padding: 1rem;
            text-align: center;
            color: var(--gray);
            font-style: italic;
        }

        /* Selected Doctor */
        .selected-doctor {
            background: var(--primary-light);
            border-radius: var(--radius);
            padding: 25px;
            margin-bottom: 30px;
            border: 2px dashed var(--primary);
            display: none;
            align-items: center;
            gap: 20px;
        }

        .selected-doctor.active {
            display: flex;
        }

        .doctor-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .doctor-info h3 {
            color: var(--primary);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .doctor-info p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Form Styles */
        .form-container {
            background-color: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            border: 1px solid var(--gray-light);
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-title i {
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 1rem;
            width: 100%;
            justify-content: center;
        }

        .btn:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.2);
        }

        .btn:disabled {
            background-color: var(--gray-light);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Appointments List */
        .appointments-section {
            background-color: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-light);
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .appointments-list {
            list-style: none;
        }

        .appointment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .appointment-item:last-child {
            border-bottom: none;
        }

        .appointment-info {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            flex: 1;
        }

        .appointment-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--dark);
        }

        .appointment-details {
            display: flex;
            gap: 1.5rem;
            font-size: 0.9rem;
            color: var(--gray);
            flex-wrap: wrap;
        }

        .appointment-details span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .appointment-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-confirmed {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status-pending {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .status-cancelled {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--gray-light);
            color: var(--dark);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .btn-outline:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
        }

        .btn-danger {
            background-color: transparent;
            border: 2px solid var(--danger);
            color: var(--danger);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .btn-danger:hover {
            background-color: rgba(234, 67, 53, 0.1);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-light);
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-size: 1.3rem;
        }

        .empty-state p {
            color: var(--gray);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }

            .sidebar-header h1 span,
            .menu-title,
            .menu-item span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }

            .menu-item {
                justify-content: center;
                padding: 15px 0;
            }

            .menu-item i {
                font-size: 1.4rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .appointment-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .appointment-actions {
                align-self: stretch;
                justify-content: space-between;
                margin-top: 1rem;
            }

            .emergency-btn span {
                display: none;
            }

            .emergency-btn {
                padding: 10px;
            }

            .appointment-details {
                flex-direction: column;
                gap: 0.5rem;
            }

            .content {
                padding: 1.5rem;
            }

            .selected-doctor {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .search-section,
            .form-container,
            .appointments-section {
                padding: 1.5rem;
            }

            .form-title,
            .search-title,
            .section-title {
                font-size: 1.2rem;
            }

            .btn {
                padding: 0.875rem 1.5rem;
            }
        }

        /* Logout form styling */
        .logout-form {
            margin: 0;
            padding: 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar (identique au dashboard) -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1><i class="fas fa-heartbeat"></i> <span>SantéPlus</span></h1>
        </div>
        

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Espace Patient</div>
                <ul class="menu-items">
                    <li>
                        <a href="{{ route('dashboard.patient') }}"
                            class="menu-item {{ request()->routeIs('dashboard.patient') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.rendez_vous.index') }}"
                            class="menu-item {{ request()->routeIs('patient.rendez_vous.*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Mes Rendez-vous</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('traitements.index') }}"
                            class="menu-item {{ request()->routeIs('traitements.*') ? 'active' : '' }}">
                            <i class="fas fa-pills"></i>
                            <span>Mes Traitements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.emergency.edit') }}"
                            class="menu-item {{ request()->routeIs('patient.emergency.*') ? 'active' : '' }}"
                            style="color:#ffdddd">
                            <i class="fas fa-phone-alt"></i>
                            <span>Contact d'urgence</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu-section">
                <div class="menu-title">Mon Compte</div>
                <ul class="menu-items">
                    <a href="{{ route('profile.edit') }}" 
                       class="menu-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Mon Profil</span>
                    </a>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar (identique au dashboard) -->
        <div class="navbar">
            <div class="navbar-left">
                <h2>Mes Rendez-vous</h2>
            </div>

            <div class="navbar-right">
              

                <div class="user-profile" id="userProfile">
                    <div class="user-avatar">
                        @if(Auth::check())
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        @endif
                    </div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Patient</div>
                    </div>
                    <i class="fas fa-chevron-down"></i>

                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Mon Profil</span>
                        </a>
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="logout-form">
                            @csrf
                            <a href="{{ route('logout') }}"
                                class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Déconnexion</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area (votre contenu original des rendez-vous) -->
        <div class="content">
            <!-- Formulaire de prise de rendez-vous avec recherche intégrée -->
            <div class="form-container">
                <h2 class="form-title">
                    <i class="fas fa-calendar-plus"></i>
                    Prendre un rendez-vous
                </h2>

                <form action="{{ route('rendez_vous.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="medecin_id" id="selectedMedecin" required>

                    <!-- Section de recherche intégrée -->
                    <div class="search-section">
                        <div class="search-container">
                            <h3 class="search-title">
                                <i class="fas fa-search"></i>
                                Rechercher un médecin
                            </h3>

                            <div class="search-box">
                                <input
                                    type="text"
                                    id="searchDoctor"
                                    class="form-input live-search"
                                    placeholder="Rechercher par nom, spécialité ou ville..."
                                    autocomplete="off">

                                <!-- Liste de résultats dynamiques -->
                                <ul id="doctorResults" class="search-results"></ul>
                            </div>
                        </div>
                    </div>

                    <!-- Médecin sélectionné -->
                    <div id="selectedDoctorSection" class="selected-doctor">
                        <div class="doctor-avatar" id="selectedDoctorAvatar"></div>
                        <div class="doctor-info">
                            <h3 id="selectedDoctorName">Médecin sélectionné</h3>
                            <p id="selectedDoctorDetails"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Date et heure :</label>
                        <input type="datetime-local" name="date_heure" class="form-input" required min="{{ date('Y-m-d\TH:i') }}">
                    </div>

                    <button type="submit" class="btn" id="submitBtn" disabled>
                        <i class="fas fa-calendar-check"></i>
                        Confirmer le rendez-vous
                    </button>
                </form>
            </div>

            <!-- Liste des rendez-vous -->
            <div class="appointments-section">
                <h3 class="section-title">
                    <i class="fas fa-list-alt"></i>
                    Rendez-vous déjà pris
                </h3>

                @if($rendezVous->count() > 0)
                <ul class="appointments-list">
                    @foreach($rendezVous as $rdv)
                    <li class="appointment-item">
                        <div class="appointment-info">
                            <div class="appointment-title">
                                Consultation avec Dr. {{ $rdv->medecin->name }}
                            </div>

                            <div class="appointment-details">
                                <span><i class="far fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y à H:i') }}
                                </span>

                                <span><i class="fas fa-user-md"></i>
                                    Dr. {{ $rdv->medecin->name }}
                                </span>

                                <span><i class="fas fa-stethoscope"></i>
                                    {{ $rdv->type ?? 'Consultation générale' }}
                                </span>
                            </div>
                        </div>

                        <div class="appointment-actions">
                            <span class="status-badge status-{{ $rdv->status ?? 'confirmed' }}">
                                {{ ucfirst($rdv->status ?? 'Confirmé') }}
                            </span>

                            <a href="{{ route('rendez_vous.edit', $rdv->id) }}" class="btn-outline">
                                Modifier
                            </a>

                            <form action="{{ route('rendez_vous.destroy', $rdv->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler ce rendez-vous ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-outline btn-danger">Annuler</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>

                @else
                <div class="empty-state">
                    <i class="far fa-calendar-times"></i>
                    <h3>Aucun rendez-vous programmé</h3>
                    <p>Prenez votre premier rendez-vous en utilisant le formulaire ci-dessus.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div id="editModal" class="modal" style="display:none;">
        <div class="modal-content">
            <h3>Modifier le rendez-vous</h3>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')

                <label>Nouvelle date & heure :</label>
                <input type="datetime-local" name="date_heure" id="editDate" class="form-input" required>

                <button type="submit" class="btn">Enregistrer</button>
                <button type="button" class="btn-outline" onclick="closeEditModal()">Annuler</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // User profile dropdown (identique au dashboard)
            const userProfile = document.getElementById("userProfile");
            const dropdownMenu = document.getElementById("dropdownMenu");

            userProfile?.addEventListener("click", function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle("active");
            });

            document.addEventListener("click", function() {
                dropdownMenu?.classList.remove("active");
            });

            // Recherche de médecin
            const searchInput = document.getElementById("searchDoctor");
            const resultsBox = document.getElementById("doctorResults");
            const medecinIdField = document.getElementById("selectedMedecin");
            const selectedDoctorSection = document.getElementById("selectedDoctorSection");
            const selectedDoctorName = document.getElementById("selectedDoctorName");
            const selectedDoctorDetails = document.getElementById("selectedDoctorDetails");
            const selectedDoctorAvatar = document.getElementById("selectedDoctorAvatar");
            const submitBtn = document.getElementById("submitBtn");

            const medecins = @json($medecins);

            // LIVE SEARCH
            searchInput.addEventListener("keyup", function() {
                const query = this.value.toLowerCase().trim();
                resultsBox.innerHTML = "";

                if (query.length === 0) {
                    resultsBox.style.display = "none";
                    return;
                }

                const results = medecins.filter(m =>
                    m.name.toLowerCase().includes(query) ||
                    (m.specialite ?? "").toLowerCase().includes(query) ||
                    (m.adresse ?? "").toLowerCase().includes(query)
                );

                if (results.length === 0) {
                    resultsBox.innerHTML = `<li class="no-result">Aucun médecin trouvé</li>`;
                    resultsBox.style.display = "block";
                    return;
                }

                resultsBox.style.display = "block";

                results.forEach(m => {
                    const initials = m.name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
                    resultsBox.innerHTML += `
                        <li class="result-item" 
                            data-id="${m.id}" 
                            data-name="Dr. ${m.name}"
                            data-specialite="${m.specialite ?? 'Spécialité non définie'}"
                            data-adresse="${m.adresse ?? 'Adresse non spécifiée'}"
                            data-initials="${initials}">
                            <strong>Dr. ${m.name}</strong><br>
                            <small>${m.specialite ?? 'Spécialité non définie'} — ${m.adresse ?? 'Adresse inconnue'}</small>
                        </li>
                    `;
                });
            });

            // CLICK SUR UN MÉDECIN
            resultsBox.addEventListener("click", function(e) {
                if (e.target.closest(".result-item")) {
                    const item = e.target.closest(".result-item");

                    medecinIdField.value = item.dataset.id;
                    selectedDoctorName.textContent = item.dataset.name;
                    selectedDoctorDetails.textContent = `${item.dataset.specialite} — ${item.dataset.adresse}`;
                    selectedDoctorAvatar.textContent = item.dataset.initials;

                    // Afficher la section médecin sélectionné
                    selectedDoctorSection.classList.add("active");

                    // Activer le bouton de soumission
                    submitBtn.disabled = false;

                    searchInput.value = "";
                    resultsBox.innerHTML = "";
                    resultsBox.style.display = "none";
                }
            });

            // Fermer les résultats quand on clique ailleurs
            document.addEventListener("click", function(e) {
                if (!e.target.closest(".search-box")) {
                    resultsBox.style.display = "none";
                }
            });

            // Validation du formulaire
            document.querySelector("form").addEventListener("submit", function(e) {
                if (!medecinIdField.value) {
                    e.preventDefault();
                    alert("Veuillez sélectionner un médecin avant de confirmer le rendez-vous.");
                    return false;
                }

                const dateInput = document.querySelector('input[name="date_heure"]');
                const selectedDate = new Date(dateInput.value);
                const now = new Date();

                if (selectedDate <= now) {
                    e.preventDefault();
                    alert("Veuillez sélectionner une date et heure futures.");
                    return false;
                }

                if (confirm("Confirmez-vous la prise de ce rendez-vous ?")) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            });

            // Set minimum date for datetime input
            const dateInput = document.querySelector('input[name="date_heure"]');
            const now = new Date();
            const localDateTime = new Date(now.getTime() - now.getTimezoneOffset() * 60000)
                .toISOString()
                .slice(0, 16);

            if (!dateInput.value) {
                dateInput.value = localDateTime;
            }
        });

      
         
    </script>
</body>
</html>