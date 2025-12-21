<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Ajouter un Traitement</title>

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

        /* Form Container */
        .form-container {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            max-width: 700px;
            margin: 0 auto;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 30px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
        }

        .form-title i {
            color: var(--primary);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 1rem;
        }

        .form-label span {
            color: var(--danger);
            margin-left: 2px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--gray-light);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s;
            background-color: white;
            color: var(--dark);
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .form-input::placeholder {
            color: var(--gray);
        }

        /* Checkbox Styles */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .checkbox-input {
            width: 20px;
            height: 20px;
            border: 2px solid var(--gray-light);
            border-radius: 4px;
            cursor: pointer;
            appearance: none;
            position: relative;
            transition: all 0.2s;
        }

        .checkbox-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .checkbox-input:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-label {
            font-weight: 500;
            color: var(--dark);
            cursor: pointer;
        }

        .checkbox-description {
            font-size: 0.9rem;
            color: var(--gray);
            margin-top: 5px;
            margin-left: 30px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-light);
        }

        .btn-submit {
            background-color: var(--secondary);
            flex: 1;
            justify-content: center;
        }

        .btn-submit:hover {
            background-color: #2d9249;
        }

        .btn-cancel {
            background-color: var(--gray);
            flex: 1;
            justify-content: center;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
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

            .form-container {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .emergency-btn span {
                display: none;
            }

            .emergency-btn {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .content {
                padding: 20px;
            }

            .form-title {
                font-size: 1.3rem;
            }
        }
    </style>
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
                <h2>Ajouter un traitement</h2>
            </div>

            <div class="navbar-right">
                <div class="user-profile" id="userProfile">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
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

                        <form method="POST" action="{{ route('logout') }}">
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

        <!-- Content -->
        <div class="content">
            <div class="form-container">
                <h2 class="form-title">
                    <i class="fas fa-prescription-bottle-alt"></i>
                    Traitement pour le patient
                </h2>

                {{-- INFO PATIENT --}}
                <p style="margin-bottom:20px;">
                    <strong>Patient :</strong> {{ $patient->name }}
                </p>

                {{-- FORM --}}
                <form method="POST"
                    action="{{ route('medecin.traitements.store', $patient->id) }}">
                    @csrf

                    <!-- Médicament -->
                    <div class="form-group">
                        <label class="form-label">
                            Médicament <span>*</span>
                        </label>
                        <input type="text"
                            name="nom_medicament"
                            class="form-input"
                            required
                            placeholder="Ex: Paracétamol 500mg">
                    </div>

                    <!-- Dosage -->
                    <div class="form-group">
                        <label class="form-label">
                            Dosage <span>*</span>
                        </label>
                        <input type="text"
                            name="dosage"
                            class="form-input"
                            required
                            placeholder="Ex: 1 comprimé">
                    </div>

                    <!-- Heure -->
                    <!-- Fois par jour -->
                    <div class="form-group">
                        <label class="form-label">
                            Nombre de prises par jour <span>*</span>
                        </label>
                        <input type="number"
                            id="fois_par_jour"
                            name="fois_par_jour"
                            class="form-input"
                            min="1"
                            max="5"
                            required>
                    </div>

                    <!-- Durée -->
                    <div class="form-group">
                        <label class="form-label">
                            Durée du traitement (en jours) <span>*</span>
                        </label>
                        <input type="number"
                            name="duree_jours"
                            class="form-input"
                            min="1"
                            required>
                    </div>

                    <!-- Heures de prise -->
                    <div class="form-group">
                        <label class="form-label">
                            Heures de prise <span>*</span>
                        </label>

                        <div id="heures-container"></div>
                    </div>


                    <!-- Important -->
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox"
                                name="important"
                                value="1"
                                class="checkbox-input">
                            <label class="checkbox-label">
                                Traitement important
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-save"></i>
                            Enregistrer
                        </button>

                        <a href="{{ route('medecin.rendez_vous.index') }}"
                            class="btn btn-cancel">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userProfile = document.getElementById('userProfile');
            const dropdownMenu = document.getElementById('dropdownMenu');

            userProfile.addEventListener('click', e => {
                e.stopPropagation();
                dropdownMenu.classList.toggle('active');
            });

            document.addEventListener('click', () => {
                dropdownMenu.classList.remove('active');
            });
        });
        const foisInput = document.getElementById('fois_par_jour');
        const container = document.getElementById('heures-container');

        foisInput.addEventListener('input', function () {
            const nombre = parseInt(this.value);

            // Vider les anciens champs
            container.innerHTML = '';

            if (!nombre || nombre < 1) return;

            for (let i = 1; i <= nombre; i++) {
                const input = document.createElement('input');
                input.type = 'time';
                input.name = 'heures[]';
                input.className = 'form-input';
                input.required = true;

                container.appendChild(input);
            }
        });
    </script>
</body>

</html>