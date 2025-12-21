<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Espace Patient</title>
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
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
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

        /* Top Navbar */
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

        .welcome-card {
            background: linear-gradient(135deg, var(--primary) 0%, #0d47a1 100%);
            color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 20px rgba(26, 115, 232, 0.2);
        }

        .welcome-card h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .welcome-card p {
            opacity: 0.9;
            font-size: 1rem;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .appointments .card-icon {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .treatments .card-icon {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .health-data .card-icon {
            background-color: rgba(26, 115, 232, 0.1);
            color: var(--primary);
        }

        .card-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-description {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Styles pour les listes */
        .list-section {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .list-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .list-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .list-title i {
            color: var(--primary);
        }

        .list-count {
            background-color: var(--primary-light);
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .treatments-list {
            list-style: none;
        }

        .treatment-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s;
        }

        .treatment-item:last-child {
            border-bottom: none;
        }

        .treatment-item:hover {
            background-color: var(--primary-light);
            border-radius: 8px;
        }

        .treatment-status {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: var(--danger);
            flex-shrink: 0;
        }

        .treatment-info {
            flex: 1;
        }

        .treatment-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 1rem;
        }

        .treatment-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .treatment-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .treatment-detail i {
            color: var(--primary);
            font-size: 0.9rem;
        }

        /* Tableau des rendez-vous */
        .appointments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .appointments-table thead {
            background-color: var(--primary-light);
        }

        .appointments-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid var(--primary);
            font-size: 0.9rem;
        }

        .appointments-table tbody tr {
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s;
        }

        .appointments-table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .appointments-table tbody tr:last-child {
            border-bottom: none;
        }

        .appointments-table td {
            padding: 15px;
            font-size: 0.9rem;
        }

        .appointment-time {
            font-weight: 600;
            color: var(--primary);
            font-size: 1rem;
        }

        .appointment-doctor {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .doctor-avatar-small {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .doctor-name {
            font-weight: 500;
            color: var(--dark);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-confirmed {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status-pending {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .status-active {
            background-color: rgba(26, 115, 232, 0.1);
            color: var(--primary);
        }

        .status-canceled {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        /* Messages d'état */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray-light);
            margin-bottom: 15px;
        }

        .empty-state p {
            font-size: 1rem;
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
            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .treatment-details {
                flex-direction: column;
                gap: 8px;
            }

            .appointments-table {
                display: block;
                overflow-x: auto;
            }

            .appointments-table thead {
                display: none;
            }

            .appointments-table tbody,
            .appointments-table tr,
            .appointments-table td {
                display: block;
                width: 100%;
            }

            .appointments-table tr {
                margin-bottom: 15px;
                border: 1px solid var(--gray-light);
                border-radius: 8px;
                padding: 10px;
            }

            .appointments-table td {
                padding: 10px 15px;
                border-bottom: 1px solid var(--gray-light);
                text-align: right;
            }

            .appointments-table td:last-child {
                border-bottom: none;
            }

            .appointments-table td::before {
                content: attr(data-label);
                font-weight: 600;
                float: left;
                color: var(--primary);
            }

            .emergency-btn span {
                display: none;
            }

            .emergency-btn {
                padding: 10px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
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
                    <!-- Lien vers édition profil -->
                    <a href="{{ route('profile.edit') }}" class="menu-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Mon Profil</span>
                    </a>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="navbar">
            <div class="navbar-left">
                <h2>Mon Tableau de bord</h2>
            </div>

            <div class="navbar-right">


                <div class="user-profile" id="userProfile">
                    <div class="user-avatar">ML</div>
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

        <!-- Content Area -->
        <div class="content">
            <div class="welcome-card">
                <h1>Bonjour, {{ Auth::user()->name }} !</h1>
                <p>Bienvenue dans votre espace patient SantéPlus.</p>
            </div>

            <div class="dashboard-cards">
                <div class="card appointments">
                    <div class="card-header">
                        <div class="card-title">Rendez-vous</div>
                        <div class="card-icon"><i class="fas fa-calendar-check"></i></div>
                    </div>
                    <div class="card-value">{{ $rendezVousCount }}</div>
                    <div class="card-description">Prochains rendez-vous</div>
                </div>

                <div class="card treatments">
                    <div class="card-header">
                        <div class="card-title">Traitements</div>
                        <div class="card-icon"><i class="fas fa-pills"></i></div>
                    </div>
                    <div class="card-value">{{ $traitementsCount }}</div>
                    <div class="card-description">En cours</div>
                </div>
            </div>

            <!-- Liste des traitements non pris -->
            <div class="list-section">
                <div class="list-header">
                    <h2 class="list-title">
                        <i class="fas fa-exclamation-circle"></i>
                        Traitements non pris
                    </h2>
                    <span class="list-count">{{ $traitementsNonPris->count() }}</span>
                </div>
                
                @if($traitementsNonPris->count() > 0)
                    <ul class="treatments-list">
                        @foreach($traitementsNonPris as $traitement)
                            <li class="treatment-item">
                                <div class="treatment-status"></div>
                                <div class="treatment-info">
                                    <div class="treatment-name">{{ $traitement->nom }}</div>
                                    <div class="treatment-details">
                                        <div class="treatment-detail">
                                            <i class="fas fa-prescription-bottle-alt"></i>
                                            <span>Posologie: {{ $traitement->posologie }}</span>
                                        </div>
                                        <div class="treatment-detail">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>Début: {{ \Carbon\Carbon::parse($traitement->date_debut)->format('d/m/Y') }}</span>
                                        </div>
                                        <div class="treatment-detail">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Fin: {{ \Carbon\Carbon::parse($traitement->date_fin)->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="empty-state">
                        <i class="fas fa-check-circle"></i>
                        <p>Tous vos traitements sont à jour !</p>
                    </div>
                @endif
            </div>

            <!-- Liste des rendez-vous d'aujourd'hui -->
            <div class="list-section">
                <div class="list-header">
                    <h2 class="list-title">
                        <i class="fas fa-calendar-day"></i>
                        Rendez-vous aujourd'hui
                    </h2>
                    <span class="list-count">{{ $rendezVousAujourdhui->count() }}</span>
                </div>
                
                @if($rendezVousAujourdhui->count() > 0)
                    <table class="appointments-table">
                        <thead>
                            <tr>
                                <th>Heure</th>
                                <th>Médecin</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rendezVousAujourdhui as $rdv)
                                @php
                                    // Déterminer la classe du statut
                                    $statusClass = 'status-active';
                                    if($rdv->status == 'confirmé') $statusClass = 'status-confirmed';
                                    elseif($rdv->status == 'en attente') $statusClass = 'status-pending';
                                    elseif($rdv->status == 'annulé') $statusClass = 'status-canceled';
                                @endphp
                                <tr>
                                    <td data-label="Heure" class="appointment-time">
                                        {{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}
                                    </td>
                                    <td data-label="Médecin">
                                        <div class="appointment-doctor">
                                            <div class="doctor-avatar-small">
                                                {{ substr($rdv->medecin->name, 0, 2) }}
                                            </div>
                                            <div class="doctor-name">{{ $rdv->medecin->name }}</div>
                                        </div>
                                    </td>
                                    <td data-label="Statut">
                                        <span class="status-badge {{ $statusClass }}">
                                            {{ ucfirst($rdv->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <p>Aucun rendez-vous prévu pour aujourd'hui</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion du dropdown du profil utilisateur
            const userProfile = document.getElementById('userProfile');
            const dropdownMenu = document.getElementById('dropdownMenu');

            userProfile.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('active');
            });

            // Fermer le dropdown en cliquant ailleurs
            document.addEventListener('click', function() {
                dropdownMenu.classList.remove('active');
            });

            // Rendre le tableau responsive sur mobile
            function makeTableResponsive() {
                if (window.innerWidth <= 768) {
                    const table = document.querySelector('.appointments-table');
                    if (table) {
                        const headers = [];
                        const ths = table.querySelectorAll('th');
                        ths.forEach(th => headers.push(th.textContent));

                        const tds = table.querySelectorAll('td');
                        tds.forEach((td, index) => {
                            const headerIndex = index % headers.length;
                            td.setAttribute('data-label', headers[headerIndex]);
                        });
                    }
                }
            }

            // Exécuter au chargement et au redimensionnement
            makeTableResponsive();
            window.addEventListener('resize', makeTableResponsive);
        });
    </script>

</body>
</html>