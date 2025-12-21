<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Mes Traitements</title>
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

        /* Header Section */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title i {
            color: var(--secondary);
        }

        .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--secondary);
        }

        .btn-secondary:hover {
            background-color: #2d9249;
        }

        /* Treatments Table */
        .treatments-container {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .treatments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .treatments-table th {
            background-color: var(--primary-light);
            color: var(--dark);
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 2px solid var(--primary);
        }

        .treatments-table td {
            padding: 15px;
            border-bottom: 1px solid var(--gray-light);
            vertical-align: middle;
        }

        .treatments-table tr:hover {
            background-color: var(--primary-light);
        }

        .treatments-table tr:last-child td {
            border-bottom: none;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-important {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        .status-normal {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status-pris {
            background-color: #28a745;
            color: white;
        }

        .status-non-pris {
            background-color: #ffc107;
            color: var(--dark);
        }

        /* Actions */
        .actions-container {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-sm {
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .btn-success {
            background-color: var(--secondary);
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #2d9249;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--gray-light);
            color: var(--dark);
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .btn-outline:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
        }

        .btn-outline.edit {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline.delete {
            color: var(--danger);
            border-color: var(--danger);
        }

        .btn-outline.delete:hover {
            background-color: rgba(234, 67, 53, 0.1);
        }

        .form-inline {
            display: inline;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--gray-light);
        }

        .empty-state h3 {
            margin-bottom: 10px;
            color: var(--dark);
            font-size: 1.3rem;
        }

        .empty-state p {
            margin-bottom: 25px;
            font-size: 1rem;
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .treatments-table th,
            .treatments-table td {
                padding: 10px 5px;
                font-size: 0.9rem;
            }

            .actions-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .btn-outline {
                width: 100%;
                justify-content: center;
            }


        }

        @media (max-width: 576px) {
            .treatments-table {
                display: block;
            }

            .treatments-table thead {
                display: none;
            }

            .treatments-table tbody,
            .treatments-table tr,
            .treatments-table td {
                display: block;
                width: 100%;
            }

            .treatments-table tr {
                margin-bottom: 20px;
                border: 1px solid var(--gray-light);
                border-radius: 8px;
                padding: 10px;
                position: relative;
            }

            .treatments-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                border-bottom: 1px solid var(--gray-light);
            }

            .treatments-table td:last-child {
                border-bottom: none;
            }

            .treatments-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-right: 10px;
                font-weight: 600;
                text-align: left;
            }

            .actions-container {
                flex-direction: row;
                justify-content: flex-end;
            }

            .btn-outline {
                width: auto;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        // Fonction pour rendre le tableau responsive
        function makeTableResponsive() {
            if (window.innerWidth <= 576) {
                const table = document.querySelector('.treatments-table');
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
        document.addEventListener('DOMContentLoaded', makeTableResponsive);
        window.addEventListener('resize', makeTableResponsive);
    </script>
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
                    <a href="{{ route('dashboard.patient') }}" class="menu-item">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="{{ route('patient.rendez_vous.index') }}" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <a href="{{ route('traitements.index') }}" class="menu-item active">
                        <i class="fas fa-pills"></i>
                        <span>Mes Traitements</span>
                    </a>
                    <a href="{{ route('patient.emergency.edit') }}"
                        class="menu-item active">
                        <i class="fas fa-phone-alt"></i> Contact d’urgence
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
                <h2>Mes Traitements</h2>
            </div>

            <div class="navbar-right">
                <div class="user-profile" id="userProfile">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 2) }}</div>
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
            <!-- Header -->
            <div class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-pills"></i>
                    Mes Traitements
                </h1>
                
            </div>

            <!-- Treatments Table -->
            <div class="treatments-container">
                @if($traitements->count() > 0)
                <div class="table-responsive">
                    <table class="treatments-table">
                        <thead>
                            <tr>
                                <th>Médicament</th>
                                <th>Dosage</th>
                                <th>Heure de prise</th>
                                <th>Important</th>
                                <th>Pris</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traitements as $t)
                            <tr>
                                <td>
                                    <strong>{{ $t->nom_medicament }}</strong>
                                </td>

                                <td>
                                    <span class="dosage-badge">{{ $t->dosage }}</span>
                                </td>

                                <td>
                                    <i class="far fa-clock" style="margin-right: 5px;"></i>
                                    {{ $t->heure_prise }}
                                </td>

                                <td>
                                    @if($t->important)
                                    <span class="status-badge status-important">
                                        <i class="fas fa-exclamation-circle"></i> Oui
                                    </span>
                                    @else
                                    <span class="status-badge status-normal">Non</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($t->pris)
                                    <span class="status-badge status-pris">
                                        <i class="fas fa-check-circle"></i> Pris
                                    </span>
                                    @else
                                    <span class="status-badge status-non-pris">
                                        <i class="fas fa-clock"></i> Non pris
                                    </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="actions-container">
                                        {{-- Bouton Marquer comme pris --}}
                                        @if (!$t->pris)
                                        <form action="{{ route('traitements.pris', $t->id) }}" method="POST" class="form-inline">
                                            @csrf
                                            <button type="submit" class="btn-success btn-sm"
                                                style="padding: 6px 12px; display: flex; align-items: center; gap: 5px;">
                                                <i class="fas fa-check"></i>
                                                Pris
                                            </button>
                                        </form>
                                        @endif

                                        {{-- Modifier --}}
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-prescription-bottle-alt"></i>
                    <h3>Aucun traitement enregistré</h3>
                    <p>Commencez par ajouter votre premier traitement pour mieux gérer votre santé.</p>
                    
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
        });
    </script>
</body>

</html>