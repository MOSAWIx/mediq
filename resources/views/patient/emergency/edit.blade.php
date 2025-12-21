<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Contact d'urgence</title>
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
            color: var(--danger);
        }

        /* Emergency Grid */
        .emergency-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        /* Card */
        .card {
            background-color: white;
            border-radius: var(--radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-light);
            transition: all 0.3s ease;
            height: fit-content;
        }

        .card:hover {
            box-shadow: 0 12px 40px rgba(0, 87, 146, 0.15);
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--primary);
        }

        /* Current Emergency Card */
        .emergency-card {
            background: linear-gradient(135deg, var(--primary-light), #f0f7ff);
            border: 2px solid var(--primary);
        }

        .emergency-card .card-title i {
            color: var(--primary);
        }

        /* Form Styles */
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

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--gray-light);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        /* Emergency Contact Details */
        .emergency-details {
            display: grid;
            gap: 1.5rem;
        }

        .detail-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            border: 1px solid var(--gray-light);
        }

        .detail-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .detail-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .detail-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        .detail-content {
            font-size: 1.1rem;
            color: var(--gray);
            font-weight: 500;
        }

        /* Emergency Info Banner */
        .emergency-info {
            background: linear-gradient(135deg, #fff5f5, #ffecec);
            border-radius: var(--radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid var(--danger);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .emergency-info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--danger), #ff6b8b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .emergency-text h3 {
            color: var(--dark);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .emergency-text p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background-color: rgba(52, 168, 83, 0.1);
            color: var(--secondary);
            border-color: rgba(52, 168, 83, 0.2);
        }

        .btn {
            background-color: var(--danger);
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
            background-color: #c23321;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.2);
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
            font-size: 1.2rem;
            color: var(--dark);
            margin-bottom: 0.5rem;
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

            .emergency-grid {
                grid-template-columns: 1fr;
                gap: 20px;
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

            .card {
                padding: 1.5rem;
            }

            .emergency-info {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .container h2 {
                font-size: 1.5rem;
            }

            .card {
                padding: 1.25rem;
            }

            .card-title {
                font-size: 1.1rem;
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
                    <!-- Lien vers dashboard patient -->
                    <a href="{{ route('dashboard.patient') }}" class="menu-item">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <!-- Lien vers rendez-vous -->
                    <a href="{{ route('patient.rendez_vous.index') }}" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <!-- Lien vers traitements -->
                    <a href="{{ route('traitements.index') }}" class="menu-item">
                        <i class="fas fa-pills"></i>
                        <span>Mes Traitements</span>
                    </a>
                    <!-- Lien vers contact d'urgence -->
                    <a href="{{ route('patient.emergency.edit') }}" class="menu-item active">
                        <i class="fas fa-phone-alt"></i>
                        <span>Contact d'urgence</span>
                    </a>
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
                <h2>Contact d'urgence</h2>
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
                    <i class="fas fa-phone-alt"></i>
                    Contact d'urgence
                </h2>
                
                <!-- Emergency Information -->
                <div class="emergency-info">
                    <div class="emergency-info-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="emergency-text">
                        <h3>Information importante</h3>
                        <p>Veuillez renseigner les coordonnées d'une personne à contacter en cas d'urgence médicale.</p>
                    </div>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Two Column Layout -->
                <div class="emergency-grid">
                    <!-- Left Column: Current Emergency Contact -->
                    <div class="card emergency-card">
                        <h3 class="card-title">
                            <i class="fas fa-user-check"></i>
                            Contact d'urgence actuel
                        </h3>
                        
                        @if(isset($patient) && ($patient->emergency_name || $patient->emergency_phone || $patient->emergency_relation))
                            <div class="emergency-details">
                                @if($patient->emergency_name)
                                    <div class="detail-card">
                                        <div class="detail-header">
                                            <div class="detail-icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="detail-title">Nom complet</div>
                                        </div>
                                        <div class="detail-content">{{ $patient->emergency_name }}</div>
                                    </div>
                                @endif
                                
                                @if($patient->emergency_phone)
                                    <div class="detail-card">
                                        <div class="detail-header">
                                            <div class="detail-icon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <div class="detail-title">Numéro de téléphone</div>
                                        </div>
                                        <div class="detail-content">{{ $patient->emergency_phone }}</div>
                                    </div>
                                @endif
                                
                                @if($patient->emergency_relation)
                                    <div class="detail-card">
                                        <div class="detail-header">
                                            <div class="detail-icon">
                                                <i class="fas fa-handshake"></i>
                                            </div>
                                            <div class="detail-title">Relation avec vous</div>
                                        </div>
                                        <div class="detail-content">{{ $patient->emergency_relation }}</div>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-user-slash"></i>
                                </div>
                                <h3>Aucun contact d'urgence</h3>
                                <p>Vous n'avez pas encore défini de contact d'urgence. Veuillez remplir le formulaire pour en ajouter un.</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Right Column: Form -->
                    <div class="card">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Modifier le contact d'urgence
                        </h3>
                        
                        <form method="POST" action="{{ route('patient.emergency.update') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label">Nom complet</label>
                                <input type="text"
                                       name="emergency_name"
                                       class="form-input"
                                       value="{{ old('emergency_name', $patient->emergency_name ?? '') }}"
                                       placeholder="Ex: Jean Dupont"
                                       required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Numéro de téléphone</label>
                                <input type="tel"
                                       name="emergency_phone"
                                       class="form-input"
                                       value="{{ old('emergency_phone', $patient->emergency_phone ?? '') }}"
                                       placeholder="Ex: 06 12 34 56 78"
                                       required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Relation avec vous</label>
                                <input type="text"
                                       name="emergency_relation"
                                       class="form-input"
                                       value="{{ old('emergency_relation', $patient->emergency_relation ?? '') }}"
                                       placeholder="Ex: Conjoint(e), Parent, Frère/Soeur, Ami"
                                       required>
                            </div>

                            <button type="submit" class="btn">
                                <i class="fas fa-save"></i>
                                Enregistrer le contact
                            </button>
                        </form>
                    </div>
                </div>
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

            // Phone number formatting
            const phoneInput = document.querySelector('input[name="emergency_phone"]');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 2) {
                        value = value.substring(0, 2) + ' ' + value.substring(2);
                    }
                    if (value.length > 5) {
                        value = value.substring(0, 5) + ' ' + value.substring(5);
                    }
                    if (value.length > 8) {
                        value = value.substring(0, 8) + ' ' + value.substring(8);
                    }
                    if (value.length > 11) {
                        value = value.substring(0, 11) + ' ' + value.substring(11);
                    }
                    e.target.value = value.trim();
                });
            }
        });
    </script>
</body>
</html>