<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Espace Médecin</title>
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
            --radius: 12px;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary) 0%, #0d47a1 100%);
            color: white;
            border-radius: var(--radius);
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .welcome-card h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .welcome-card p {
            opacity: 0.9;
            font-size: 1rem;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            transition: transform 0.3s, box-shadow 0.3s;
            flex: 1;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
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
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .card-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .card-description {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Patients List */
        .patients-section {
            background-color: white;
            border-radius: var(--radius);
            padding: 25px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        /* Table Styles */
        .patients-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .patients-table thead {
            background-color: var(--light);
            border-bottom: 2px solid var(--gray-light);
        }

        .patients-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .patients-table tbody tr {
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s;
        }

        .patients-table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .patients-table td {
            padding: 15px;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .patients-table td:first-child {
            font-weight: 500;
            color: var(--dark);
        }

        /* Status Badges */
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }

        .status.accepted {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status.cancelled {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        .status.pending {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--gray-light);
        }

        .empty-state h3 {
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 10px;
            font-weight: 600;
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
            .dashboard-cards {
                flex-direction: column;
            }

            .navbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .content {
                padding: 20px;
            }

            .patients-table {
                display: block;
                overflow-x: auto;
            }

            .patients-table th,
            .patients-table td {
                padding: 10px;
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .welcome-card h1 {
                font-size: 1.5rem;
            }

            .card-value {
                font-size: 1.8rem;
            }

            .status {
                font-size: 0.75rem;
                padding: 4px 8px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h1><i class="fas fa-stethoscope"></i> <span>SantéPlus</span></h1>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Espace Médecin</div>
                <ul class="menu-items">
                    <a href="{{ route('dashboard.medecin') }}" class="menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="{{ route('medecin.rendez_vous.index') }}" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <a href="{{ route('medecin.traitements.index') }}" class="menu-item">
                        <i class="fas fa-pills"></i>
                        <span>Traitements patients</span>
                    </a>
                </ul>
            </div>

            <div class="menu-section">
                <div class="menu-title">Mon Compte</div>
                <ul class="menu-items">
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
                    <div class="user-avatar">DR</div>
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Médecin</div>
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
                <h1>Bonjour, Dr. {{ Auth::user()->name }} !</h1>
                <p>Bienvenue dans votre espace médecin SantéPlus.</p>
            </div>

            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Rendez-vous du jour</div>
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="card-value">{{ $rendezVousCount }}</div>
                    <div class="card-description">Consultations aujourd'hui</div>
                </div>
            </div>

            <div class="patients-section">
                <div class="section-title">
                    <i class="fas fa-users"></i>
                    Liste des patients - Aujourd'hui
                </div>

                @if($rendezVousAujourdhui->count() > 0)
                <table class="patients-table">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Heure</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rendezVousAujourdhui as $rdv)
                        <tr>
                            <td>{{ $rdv->patient->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($rdv->date_heure)->format('H:i') }}</td>
                            <td>
                                @if($rdv->status === 'accepté')
                                <span class="status accepted">Accepté</span>
                                @elseif($rdv->status === 'annulé')
                                <span class="status cancelled">Annulé</span>
                                @else
                                <span class="status pending">En attente</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <i class="far fa-calendar-times"></i>
                    <h3>Aucun rendez-vous aujourd'hui</h3>
                    <p>Vous n'avez pas de consultations programmées pour aujourd'hui.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Gestion du dropdown du profil utilisateur
        document.addEventListener('DOMContentLoaded', function() {
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

            // Gérer les clics sur les éléments du menu
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>