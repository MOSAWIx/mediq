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

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .container h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .container h2 i {
            color: var(--primary);
        }

        /* Appointments Grid */
        .appointments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }

        /* Card Styles */
        .card {
            background-color: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-light);
            transition: all 0.3s ease;
        }

        .card:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 87, 146, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .patient-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .patient-info h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .patient-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .card-body {
            margin-bottom: 1.5rem;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding: 8px 0;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark);
            min-width: 80px;
            font-size: 0.9rem;
        }

        .info-value {
            color: var(--gray);
            flex: 1;
            font-size: 0.95rem;
        }

        .info-icon {
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background-color: rgba(251, 188, 5, 0.1);
            color: var(--accent);
        }

        .status-confirmed {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
        }

        .status-cancelled {
            background-color: rgba(234, 67, 53, 0.1);
            color: var(--danger);
        }

        .status-completed {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }

        /* Emergency Contact Section */
        .emergency-contact {
            margin: 12px 0;
            padding: 12px;
            border-radius: 12px;
            background: rgba(234, 67, 53, 0.1);
            border: 1px solid rgba(234, 67, 53, 0.3);
        }

        .emergency-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }

        .emergency-header i {
            color: var(--danger);
        }

        .emergency-header strong {
            color: var(--danger);
            font-size: 0.95rem;
        }

        .emergency-details {
            font-size: 0.95rem;
            color: #c92a2a;
            margin-bottom: 4px;
        }

        .emergency-phone {
            display: inline-block;
            margin-top: 6px;
            font-weight: 700;
            color: #c92a2a;
            text-decoration: none;
        }

        .emergency-phone:hover {
            text-decoration: underline;
        }

        .no-emergency {
            margin-top: 10px;
            font-size: 0.85rem;
            color: var(--gray);
            font-style: italic;
        }

        /* Actions */
        .card-actions {
            display: flex;
            gap: 10px;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-light);
            margin-top: 1rem;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
            text-decoration: none;
        }

        .btn-success {
            background-color: var(--secondary);
            color: white;
        }

        .btn-success:hover {
            background-color: #2d8b4c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(52, 168, 83, 0.2);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.2);
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #0d47a1;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.2);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .empty-icon {
            font-size: 4rem;
            color: var(--gray-light);
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
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

            .container h2 {
                font-size: 1.5rem;
            }

            .appointments-grid {
                grid-template-columns: 1fr;
            }

            .card-actions {
                flex-wrap: wrap;
            }

            .btn {
                flex: 1;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .card {
                padding: 1.25rem;
            }

            .card-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .info-label {
                min-width: auto;
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
                    <a href="{{ route('medecin.rendez_vous.index') }}" class="menu-item active">
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
                <h2>Mes rendez-vous</h2>
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
            <div class="container">
                <h2>
                    <i class="fas fa-calendar-alt"></i>
                    Mes rendez-vous
                </h2>
                
                @if($rendezVous->count() > 0)
                    <div class="appointments-grid">
                        @foreach($rendezVous as $rdv)
                            <div class="card">
                                <div class="card-header">
                                    <div class="patient-avatar">
                                        {{ substr($rdv->patient->name, 0, 2) }}
                                    </div>
                                    <div class="patient-info">
                                        <h3>{{ $rdv->patient->name }}</h3>
                                        <p>Patient</p>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <div class="info-row">
                                        <i class="fas fa-user info-icon"></i>
                                        <span class="info-label">Patient :</span>
                                        <span class="info-value">{{ $rdv->patient->name }}</span>
                                    </div>
                                    
                                    <div class="info-row">
                                        <i class="far fa-calendar info-icon"></i>
                                        <span class="info-label">Date :</span>
                                        <span class="info-value">{{ \Carbon\Carbon::parse($rdv->date_heure)->format('d/m/Y H:i') }}</span>
                                    </div>
                                    
                                    <div class="info-row">
                                        <i class="fas fa-info-circle info-icon"></i>
                                        <span class="info-label">Statut :</span>
                                        <span class="info-value">
                                            <span class="status-badge status-{{ $rdv->status }}">
                                                {{ ucfirst($rdv->status) }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Contact d'urgence -->
                                @if($rdv->patient && $rdv->patient->patient && $rdv->patient->patient->emergency_phone)
                                    <div class="emergency-contact">
                                        <div class="emergency-header">
                                            <i class="fas fa-phone-alt"></i>
                                            <strong>Contact d'urgence</strong>
                                        </div>
                                        
                                        <div class="emergency-details">
                                            {{ $rdv->patient->patient->emergency_name }}
                                            ({{ $rdv->patient->patient->emergency_relation }})
                                        </div>
                                        
                                        <a href="tel:{{ $rdv->patient->patient->emergency_phone }}" class="emergency-phone">
                                            {{ $rdv->patient->patient->emergency_phone }}
                                        </a>
                                    </div>
                                @else
                                    <div class="no-emergency">
                                        Contact d'urgence non renseigné
                                    </div>
                                @endif
                                
                                <!-- Bouton ajouter traitement -->
                                <a href="{{ route('medecin.traitements.create', $rdv->patient->id) }}" class="btn btn-primary" style="width: 100%; margin-top: 10px;">
                                    <i class="fas fa-pills"></i>
                                    Ajouter traitement
                                </a>

                                <!-- Actions (Accepter/Refuser) -->
                                @if($rdv->status == 'en attente' || $rdv->status == 'pending')
                                    <div class="card-actions">
                                        <form action="{{ route('rendez_vous.accepter', $rdv->id) }}" method="POST" style="flex: 1;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                                Accepter
                                            </button>
                                        </form>

                                        <form action="{{ route('rendez_vous.refuser', $rdv->id) }}" method="POST" style="flex: 1;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                                Refuser
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="far fa-calendar-times"></i>
                        </div>
                        <h3>Aucun rendez-vous</h3>
                        <p>Vous n'avez pas encore de rendez-vous programmés. Les demandes apparaîtront ici lorsqu'un patient prendra rendez-vous avec vous.</p>
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

            // Confirmation before accepting/rejecting appointments
            const acceptForms = document.querySelectorAll('form[action*="accepter"] button[type="submit"]');
            const rejectForms = document.querySelectorAll('form[action*="refuser"] button[type="submit"]');

            acceptForms.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm("Confirmez-vous l'acceptation de ce rendez-vous ?")) {
                        e.preventDefault();
                    }
                });
            });

            rejectForms.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm("Confirmez-vous le refus de ce rendez-vous ?")) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>