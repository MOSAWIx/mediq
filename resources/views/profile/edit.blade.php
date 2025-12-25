<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - SantéPlus</title>
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
            --header-height: 70px;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            min-height: 100vh;
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

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-title {
            font-weight: 600;
            color: var(--dark);
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-title i {
            color: var(--primary);
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
            animation: fadeIn 0.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Main Content */
        .main-content {
            padding: 30px;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Back Button Styling */
        .back-container {
            margin-bottom: 30px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background-color: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .back-button:hover {
            background-color: var(--primary-light);
            transform: translateX(-3px);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.15);
        }

        .back-button:active {
            transform: translateX(-1px);
        }

        .back-button i {
            font-size: 1rem;
        }

        /* Form Sections Styling */
        .form-sections {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .form-card {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-light);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-card h2 {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card h2 i {
            font-size: 1.2rem;
        }

        .form-card p {
            color: var(--gray);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        /* Form Elements Styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--gray-light);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .form-input::placeholder {
            color: #9aa0a6;
        }

        .error-message {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 0.9rem;
        }

        /* Verification Notice */
        .verification-notice {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 8px;
            padding: 12px 16px;
            margin-top: 10px;
        }

        .verification-text {
            color: #856404;
            font-size: 0.9rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .verification-button {
            background: none;
            border: none;
            color: var(--primary);
            font-size: 0.9rem;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 12px 16px;
            color: #155724;
            font-size: 0.9rem;
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--primary-light);
        }

        .primary-button {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .primary-button:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.2);
        }

        .primary-button i {
            font-size: 1rem;
        }

        .saved-message {
            background-color: var(--secondary);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            animation: fadeIn 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Delete Section Specific */
        .danger-button {
            background-color: var(--danger);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .danger-button:hover {
            background-color: #c23321;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.2);
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .modal-container {
            background: white;
            border-radius: 12px;
            max-width: 500px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-content {
            padding: 30px;
        }

        .modal-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--danger);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-body {
            margin-bottom: 25px;
        }

        .modal-warning {
            background-color: #fff9f9;
            border: 1px solid #ffcdd2;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .modal-warning p {
            color: #b71c1c;
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--primary-light);
        }

        .secondary-button {
            background-color: #f8f9fa;
            color: #5f6368;
            border: 1px solid var(--gray-light);
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .secondary-button:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .navbar-title span {
                display: none;
            }

            .main-content {
                padding: 20px;
            }

            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .primary-button,
            .danger-button {
                width: 100%;
                justify-content: center;
            }

            .modal-content {
                padding: 20px;
            }
            
            .modal-actions {
                flex-direction: column-reverse;
            }
            
            .secondary-button,
            .danger-button {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .form-card h2 {
                font-size: 1.1rem;
            }

            .form-input {
                padding: 10px 14px;
            }

            .back-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <h2 class="navbar-title">
                <i class="fas fa-user-cog"></i>
                <span>Mon Profil</span>
            </h2>
        </div>

        <div class="navbar-right">
            <div class="user-profile" id="userProfile">
                <div class="user-avatar">{{ substr(Auth::user()->name, 0, 2) }}</div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
                <i class="fas fa-chevron-down"></i>

                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user"></i>
                        <span>Mon Profil</span>
                    </a>
                    <a href="{{ auth()->user()->role === 'patient' ? route('dashboard.patient') : route('dashboard.medecin') }}" 
                       class="dropdown-item">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    @if(auth()->user()->role === 'patient')
                    <a href="{{ route('patient.rendez_vous.index') }}" class="dropdown-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <a href="{{ route('traitements.index') }}" class="dropdown-item">
                        <i class="fas fa-pills"></i>
                        <span>Mes Traitements</span>
                    </a>
                    @endif
                    @if(auth()->user()->role === 'medecin')
                    <a href="{{ route('medecin.rendez_vous.index') }}" class="dropdown-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Rendez-vous</span>
                    </a>
                    <a href="{{ route('medecin.traitements.index') }}" class="dropdown-item">
                        <i class="fas fa-pills"></i>
                        <span>Traitements</span>
                    </a>
                    @endif
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
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-container">
            <!-- Back Button -->
            <div class="back-container">
                <a href="{{ auth()->user()->role === 'patient' ? route('dashboard.patient') : route('dashboard.medecin') }}"
                   class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Retour 
                </a>
            </div>

            <!-- Form Sections -->
            <div class="form-sections">
                <!-- Update Profile Information -->
                <div class="form-card">
                    <h2><i class="fas fa-user-edit"></i> Informations du profil</h2>
                    <p>Mettez à jour vos informations personnelles et votre adresse email.</p>
                    
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name" class="form-label">Nom complet</label>
                            <input 
                                id="name" 
                                name="name" 
                                type="text" 
                                class="form-input"
                                value="{{ old('name', $user->name) }}" 
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Votre nom complet"
                            />
                            @error('name')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                class="form-input"
                                value="{{ old('email', $user->email) }}" 
                                required 
                                autocomplete="username"
                                placeholder="Votre adresse email"
                            />
                            @error('email')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="verification-notice">
                                    <p class="verification-text">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        Votre adresse email n'est pas vérifiée.
                                    </p>
                                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                        @csrf
                                        <button type="submit" class="verification-button">
                                            <i class="fas fa-paper-plane"></i>
                                            Renvoyer l'email de vérification
                                        </button>
                                    </form>
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="success-message">
                                            <i class="fas fa-check-circle"></i>
                                            Un nouveau lien de vérification a été envoyé à votre adresse email.
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Telephone -->
                        @if($user->role === 'patient' || $user->role === 'medecin')
                            <div class="form-group">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input 
                                    id="telephone" 
                                    name="telephone" 
                                    type="text" 
                                    class="form-input"
                                    value="{{ old('telephone', $user->telephone) }}" 
                                    required
                                    placeholder="Votre numéro de téléphone"
                                />
                                @error('telephone')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <!-- Adresse (médecin seulement) -->
                        @if($user->role === 'medecin')
                            <div class="form-group">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input 
                                    id="adresse" 
                                    name="adresse" 
                                    type="text" 
                                    class="form-input"
                                    value="{{ old('adresse', $user->adresse) }}" 
                                    required
                                    placeholder="Votre adresse professionnelle"
                                />
                                @error('adresse')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif

                        <!-- Save Button -->
                        <div class="form-actions">
                            <button type="submit" class="primary-button">
                                <i class="fas fa-save"></i>
                                Enregistrer les modifications
                            </button>

                            @if (session('status') === 'profile-updated')
                                <div x-data="{ show: true }"
                                     x-show="show"
                                     x-transition
                                     x-init="setTimeout(() => show = false, 2000)"
                                     class="saved-message">
                                    <i class="fas fa-check"></i>
                                    Modifications enregistrées !
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="form-card">
                    <h2><i class="fas fa-lock"></i> Mettre à jour le mot de passe</h2>
                    <p>Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.</p>
                    
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="update_password_current_password" class="form-label">Mot de passe actuel</label>
                            <input 
                                id="update_password_current_password" 
                                name="current_password" 
                                type="password" 
                                class="form-input"
                                autocomplete="current-password"
                                placeholder="Votre mot de passe actuel"
                            />
                            @error('current_password', 'updatePassword')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label for="update_password_password" class="form-label">Nouveau mot de passe</label>
                            <input 
                                id="update_password_password" 
                                name="password" 
                                type="password" 
                                class="form-input"
                                autocomplete="new-password"
                                placeholder="Votre nouveau mot de passe"
                            />
                            @error('password', 'updatePassword')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="update_password_password_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input 
                                id="update_password_password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                class="form-input"
                                autocomplete="new-password"
                                placeholder="Confirmez votre nouveau mot de passe"
                            />
                            @error('password_confirmation', 'updatePassword')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Save Button -->
                        <div class="form-actions">
                            <button type="submit" class="primary-button">
                                <i class="fas fa-save"></i>
                                Mettre à jour le mot de passe
                            </button>

                            @if (session('status') === 'password-updated')
                                <div x-data="{ show: true }"
                                     x-show="show"
                                     x-transition
                                     x-init="setTimeout(() => show = false, 2000)"
                                     class="saved-message">
                                    <i class="fas fa-check"></i>
                                    Mot de passe mis à jour !
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Delete Account -->
                <div class="form-card">
                    <h2><i class="fas fa-exclamation-triangle"></i> Supprimer le compte</h2>
                    <p>Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.</p>
                    
                    
                    <button class="danger-button" onclick="openDeleteModal()">
                        <i class="fas fa-trash-alt"></i>
                        Supprimer le compte
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div id="delete-modal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">
                        <i class="fas fa-exclamation-triangle"></i>
                        Êtes-vous sûr de vouloir supprimer votre compte ?
                    </h2>
                </div>

                <div class="modal-body">
                    <div class="modal-warning">
                        <p>
                            <i class="fas fa-exclamation-circle"></i>
                            Cette action est irréversible. Toutes les données seront définitivement effacées.
                        </p>
                    </div>

                    <p style="color: #5f6368; font-size: 0.95rem; line-height: 1.5; margin-bottom: 20px;">
                        Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}" id="delete-form">
                        @csrf
                        @method('delete')

                        <div style="margin-top: 25px;">
                            <label for="delete_password" class="form-label">Confirmer le mot de passe</label>
                            <input
                                id="delete_password"
                                name="password"
                                type="password"
                                class="form-input"
                                placeholder="Entrez votre mot de passe pour confirmer"
                                required
                            />
                            @error('password', 'userDeletion')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="modal-actions">
                            <button type="button" class="secondary-button" onclick="closeDeleteModal()">
                                <i class="fas fa-times"></i>
                                Annuler
                            </button>
                            
                            <button type="submit" class="danger-button">
                                <i class="fas fa-trash-alt"></i>
                                Supprimer définitivement
                            </button>
                        </div>
                    </form>
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

            // Back button functionality
            const backButton = document.querySelector('.back-button');
            if (backButton) {
                backButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.history.back();
                });
            }
        });

        // Delete Modal Functions
        function openDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('delete-modal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('delete-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('delete-modal');
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeDeleteModal();
            }
        });

        // Handle delete form submission
        document.getElementById('delete-form').addEventListener('submit', function(e) {
            const passwordInput = document.getElementById('delete_password');
            if (!passwordInput.value.trim()) {
                e.preventDefault();
                alert('Veuillez entrer votre mot de passe pour confirmer la suppression du compte.');
                passwordInput.focus();
                return;
            }
            
            if (!confirm('⚠️ AVERTISSEMENT FINAL : Cette action supprimera définitivement votre compte et toutes les données associées. Cette action est irréversible.\n\nÊtes-vous absolument sûr ?')) {
                e.preventDefault();
            }
        });

        // Open modal if there are errors
        @if($errors->userDeletion->isNotEmpty())
            document.addEventListener('DOMContentLoaded', function() {
                openDeleteModal();
            });
        @endif

        // Auto-dismiss success messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const messages = document.querySelectorAll('[x-data]');
                messages.forEach(msg => {
                    if (msg.getAttribute('x-data') && msg.getAttribute('x-data').includes('show: true')) {
                        const showAttr = msg.getAttribute('x-data');
                        msg.setAttribute('x-data', showAttr.replace('show: true', 'show: false'));
                        msg.style.display = 'none';
                    }
                });
            }, 5000);
        });
    </script>
</body>
</html>