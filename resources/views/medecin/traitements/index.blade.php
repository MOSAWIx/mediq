<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Traitements patients</title>
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

        /* Page Header */
        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .page-header h1 i {
            color: var(--primary);
            background: var(--primary-light);
            padding: 12px;
            border-radius: var(--radius);
        }

        .page-header p {
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Treatments Container */
        .treatments-container {
            background-color: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-light);
        }

        /* Table Styles */
        .treatments-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .treatments-table thead {
            background-color: var(--light);
            border-bottom: 2px solid var(--gray-light);
        }

        .treatments-table th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .treatments-table tbody tr {
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s;
        }

        .treatments-table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .treatments-table td {
            padding: 16px 12px;
            color: var(--gray);
            font-size: 0.95rem;
            vertical-align: top;
        }

        .treatments-table td:first-child {
            font-weight: 500;
            color: var(--dark);
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 5px;
        }

        .status-pris {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status-non-pris {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .status-important {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        /* Patient Info */
        .patient-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .patient-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .patient-name {
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        /* Medicine Info */
        .medicine-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .medicine-name {
            font-weight: 600;
            color: var(--dark);
        }

        .medicine-dosage {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Time Slots */
        .time-slots {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .time-slot {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            background: var(--light);
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .time-slot i {
            color: var(--primary);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--gray);
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-light);
        }

        .empty-state h3 {
            font-size: 1.3rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .empty-state p {
            color: var(--gray);
            max-width: 400px;
            margin: 0 auto;
            line-height: 1.6;
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
            
            .content {
                padding: 1.5rem;
            }

            .treatments-container {
                padding: 1.5rem;
            }

            .treatments-table {
                display: block;
                overflow-x: auto;
            }

            .treatments-table th,
            .treatments-table td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .patient-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .patient-avatar {
                width: 35px;
                height: 35px;
                font-size: 0.8rem;
            }

            .status-badge {
                font-size: 0.75rem;
                padding: 4px 8px;
            }

            .time-slot {
                font-size: 0.85rem;
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
                    <a href="{{ route('dashboard.medecin') }}" class="menu-item">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="{{ route('medecin.rendez_vous.index') }}" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <a href="{{ route('medecin.traitements.index') }}" class="menu-item active">
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
                <h2>Traitements patients</h2>
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
                        <!-- Formulaire de logout -->
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
            <!-- Page Header -->
            <div class="page-header">
                <h1>
                    <i class="fas fa-pills"></i>
                    Traitements des patients
                </h1>
                <p>Suivez l'état des traitements prescrits à vos patients</p>
            </div>

            <!-- Treatments Container -->
            <div class="treatments-container">
                @if($traitements->count() > 0)
                    <table class="treatments-table">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Médicament</th>
                                <th>Dosage</th>
                                <th>Heures de prise</th>
                                <th>Important</th>
                                <th>État</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($traitements as $t)
                            <tr>
                                <!-- Patient -->
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-avatar">
                                            {{ substr($t->patient->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="patient-name">{{ $t->patient->name }}</div>
                                            <div style="font-size: 0.85rem; color: var(--gray);">
                                                Patient
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Médicament -->
                                <td>
                                    <div class="medicine-info">
                                        <div class="medicine-name">{{ $t->nom_medicament }}</div>
                                    </div>
                                </td>

                                <!-- Dosage -->
                                <td>
                                    <div class="medicine-dosage">{{ $t->dosage }}</div>
                                </td>

                                <!-- Heures de prise -->
                                <td>
                                    <div class="time-slots">
                                        @foreach($t->prises as $prise)
                                            <div class="time-slot">
                                                <i class="far fa-clock"></i>
                                                {{ $prise->heure }}
                                            </div>
                                        @endforeach
                                    </div>
                                </td>

                                <!-- Important -->
                                <td>
                                    @if($t->important)
                                        <span class="status-badge status-important">
                                            <i class="fas fa-exclamation-circle"></i>
                                            Important
                                        </span>
                                    @else
                                        <span style="color: var(--gray);">—</span>
                                    @endif
                                </td>

                                <!-- État -->
                                <td>
                                    @foreach($t->prises as $prise)
                                        @if($prise->pris)
                                            <div class="status-badge status-pris">
                                                <i class="fas fa-check-circle"></i>
                                                {{ $prise->heure }} : Pris
                                            </div>
                                        @else
                                            <div class="status-badge status-non-pris">
                                                <i class="fas fa-clock"></i>
                                                {{ $prise->heure }} : Non pris
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-pills"></i>
                        </div>
                        <h3>Aucun traitement enregistré</h3>
                        <p>Vous n'avez pas encore prescrit de traitements à vos patients.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // User profile dropdown
            const userProfile = document.getElementById("userProfile");
            const dropdownMenu = document.getElementById("dropdownMenu");

            userProfile?.addEventListener("click", function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle("active");
            });

            document.addEventListener("click", function() {
                dropdownMenu?.classList.remove("active");
            });
        });
    </script>
</body>
</html>