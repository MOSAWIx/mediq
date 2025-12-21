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

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            background-color: white;
            border: none;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .action-btn:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .action-appointments .action-icon {
            background-color: var(--accent);
        }

        .action-treatments .action-icon {
            background-color: var(--secondary);
        }

        .action-health .action-icon {
            background-color: var(--primary);
        }

        .action-text {
            font-weight: 600;
            font-size: 0.9rem;
            text-align: center;
        }

        .appointments-section,
        .treatments-section {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            background-color: var(--primary);
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

        .btn:hover {
            background-color: #0d47a1;
        }

        .appointments-list,
        .treatments-list {
            list-style: none;
        }

        .appointment-item,
        .treatment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .appointment-item:last-child,
        .treatment-item:last-child {
            border-bottom: none;
        }

        .appointment-info,
        .treatment-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .appointment-title,
        .treatment-title {
            font-weight: 600;
        }

        .appointment-details,
        .treatment-details {
            display: flex;
            gap: 15px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .appointment-actions,
        .treatment-actions {
            display: flex;
            gap: 10px;
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
            display: inline-block;
        }

        .btn-outline:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
        }

        .status-badge {
            padding: 5px 10px;
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

        .status-active {
            background-color: rgba(26, 115, 232, 0.1);
            color: var(--primary);
        }

        .status-completed {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }

        /* Form styles for Laravel Breeze */
        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: none;
            border: none;
            color: inherit;
            font: inherit;
            cursor: pointer;
            width: 100%;
            text-align: left;
            padding: 0;
        }

        /* Modal d'urgence */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .modal-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--danger);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--danger);
        }

        .modal-body {
            margin-bottom: 25px;
        }

        .modal-body p {
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .emergency-contacts {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .emergency-contact {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background-color: var(--primary-light);
            border-radius: 8px;
            transition: all 0.2s;
        }

        .emergency-contact:hover {
            background-color: #dbe8fd;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .contact-info {
            flex: 1;
        }

        .contact-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .contact-phone {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-secondary {
            background-color: var(--gray-light);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background-color: #c8c9cb;
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

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .appointment-item,
            .treatment-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .appointment-actions,
            .treatment-actions {
                align-self: flex-end;
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
            <h1><i class="fas fa-user-injured"></i><span>SantéPlus</span></h1>
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
                            <span>Contact d’urgence</span>
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
                <p>Bienvenue dans votre espace patient SantéPlus. </p>
            </div>

            <div class="dashboard-cards">
                <div class="card appointments">
                    <div class="card-header">
                        <div class="card-title">Rendez-vous</div>
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                    <div class="card-value">{{ $rendezVousCount ?? 0 }}</div>
                    <div class="card-description">Prochains 7 jours</div>
                </div>

                <div class="card treatments">
                    <div class="card-header">
                        <div class="card-title">Traitements</div>
                        <div class="card-icon">
                            <i class="fas fa-pills"></i>
                        </div>
                    </div>
                    <div class="card-value">{{ $traitementsCount ?? 0 }}</div>
                    <div class="card-description">En cours</div>
                </div>
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

            // Gérer les boutons d'action rapide uniquement s'ils n'ont pas de lien
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                if (!button.getAttribute('href')) {
                    button.addEventListener('click', function() {
                        const actionText = this.querySelector('.action-text')?.textContent || 'Action';
                        alert(`Action: ${actionText} - Fonctionnalité en cours de développement`);
                    });
                }
            });

            // Gérer les boutons dans les sections sans lien
            const sectionButtons = document.querySelectorAll('.btn, .btn-outline');
            sectionButtons.forEach(button => {
                if (!button.hasAttribute('href')) {
                    button.addEventListener('click', function() {
                        const buttonText = this.textContent.trim();
                        alert(`Action: ${buttonText} - Fonctionnalité en cours de développement`);
                    });
                }
            });
        });
    </script>

</body>

</html>