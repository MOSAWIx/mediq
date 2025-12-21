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
            transition: margin-left 0.3s;
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
            background-color: rgba(26, 115, 232, 0.03);
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
            background-color: var(--secondary);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .status-non-pris {
            background-color: #ffc107;
            color: var(--dark);
        }

        /* Dosage badge */
        .dosage-badge {
            background-color: var(--primary-light);
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Styling for prise list */
        .prise-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .prise-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 12px;
            background-color: var(--light);
            border-radius: 6px;
            border-left: 3px solid var(--primary);
        }

        .prise-time {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .prise-time i {
            color: var(--primary);
        }

        .prise-actions {
            display: flex;
            align-items: center;
            gap: 8px;
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
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.2s;
        }

        .btn-success:hover {
            background-color: #2d9249;
            transform: translateY(-1px);
        }

        .btn-success:disabled {
            background-color: var(--gray-light);
            cursor: not-allowed;
            transform: none;
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

        /* Progress indicator */
        .progress-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .progress-text {
            font-size: 0.9rem;
            color: var(--gray);
            font-weight: 500;
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

            .prise-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .prise-actions {
                align-self: flex-end;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 1.5rem;
                color: var(--dark);
                cursor: pointer;
            }

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

        /* Mobile menu toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
            padding: 10px;
        }

        @media (max-width: 576px) {
            .mobile-menu-toggle {
                display: block;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
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
                    <a href="{{ route('patient.emergency.edit') }}" class="menu-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>Contact d'urgence</span>
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
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <i class="fas fa-bars"></i>
            </button>
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
                            <a href="{{ route('logout') }}" class="dropdown-item"
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
          
            

            <!-- Treatments Table -->
            <div class="treatments-container">
                @if($traitements->count() > 0)
                <div class="table-responsive">
                    <table class="treatments-table">
                        <thead>
                            <tr>
                                <th>Médicament</th>
                                <th>Dosage</th>
                                <th>Heures de prise</th>
                                <th>Important</th>
                                <th>Progression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traitements as $t)
                            <tr>
                                <td data-label="Médicament">
                                    <strong>{{ $t->nom_medicament }}</strong>
                                </td>

                                <td data-label="Dosage">
                                    <span class="dosage-badge">{{ $t->dosage }}</span>
                                </td>

                                <td data-label="Heures de prise">
                                    <div class="prise-list">
                                        @foreach ($t->prises as $prise)
                                        <div class="prise-item">
                                            <div class="prise-time">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $prise->heure }}</span>
                                            </div>
                                            <div class="prise-actions">
                                                @if($prise->pris)
                                                <span class="status-pris">
                                                    <i class="fas fa-check"></i>
                                                    Pris
                                                </span>
                                                @else
                                                <form action="{{ route('prises.pris', $prise->id) }}" method="POST"
                                                    class="form-inline">
                                                    @csrf
                                                    <button type="submit" class="btn-success">
                                                        <i class="fas fa-check"></i>
                                                        Marquer comme pris
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>

                                <td data-label="Important">
                                    @if($t->important)
                                    <span class="status-badge status-important">
                                        <i class="fas fa-exclamation-circle"></i>
                                        Important
                                    </span>
                                    @else
                                    <span class="status-badge status-normal">
                                        Normal
                                    </span>
                                    @endif
                                </td>

                                <td data-label="Progression">
                                    @php
                                        $prisesPrises = $t->prises->where('pris', true)->count();
                                        $totalPrises = $t->prises->count();
                                        $pourcentage = $totalPrises > 0 ? ($prisesPrises / $totalPrises) * 100 : 0;
                                    @endphp
                                    <div class="progress-indicator">
                                        <div class="progress-text">
                                            {{ $prisesPrises }}/{{ $totalPrises }}
                                        </div>
                                    </div>
                                    <div style="width: 100%; background-color: var(--gray-light); border-radius: 10px; height: 8px; margin-top: 5px;">
                                        <div style="width: {{ $pourcentage }}%; background-color: var(--secondary); height: 100%; border-radius: 10px;"></div>
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
                    <a href="#" class="btn">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter un traitement</span>
                    </a>
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

            // Gestion du menu mobile
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');

            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Fermer le menu mobile en cliquant à l'extérieur
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 576 && 
                    !sidebar.contains(e.target) && 
                    !mobileMenuToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            });

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
            makeTableResponsive();
            window.addEventListener('resize', makeTableResponsive);

            // Confirmation pour marquer comme pris
            const prisForms = document.querySelectorAll('form[action*="prises.pris"]');
            prisForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button');
                    const heure = this.closest('.prise-item').querySelector('.prise-time span').textContent;
                    const medicament = this.closest('tr').querySelector('td strong').textContent;
                    
                    if (!button.disabled) {
                        button.disabled = true;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> En cours...';
                        
                        // Simuler l'envoi du formulaire
                        setTimeout(() => {
                            button.innerHTML = '<i class="fas fa-check"></i> Pris !';
                            button.style.backgroundColor = '#28a745';
                            
                            // Mettre à jour le compteur de progression
                            const progressText = this.closest('tr').querySelector('.progress-text');
                            const [current, total] = progressText.textContent.split('/');
                            const newCurrent = parseInt(current) + 1;
                            progressText.textContent = `${newCurrent}/${total}`;
                            
                            // Mettre à jour la barre de progression
                            const progressBar = this.closest('tr').querySelector('.progress-indicator + div div');
                            const percentage = (newCurrent / parseInt(total)) * 100;
                            progressBar.style.width = `${percentage}%`;
                            
                            // Remplacer le bouton par un badge "Pris"
                            const priseActions = this.closest('.prise-actions');
                            priseActions.innerHTML = `
                                <span class="status-pris">
                                    <i class="fas fa-check"></i>
                                    Pris
                                </span>
                            `;
                        }, 800);
                        
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>