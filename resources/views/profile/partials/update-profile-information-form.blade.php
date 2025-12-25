<section>
    <style>
        .profile-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .profile-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e8f0fe;
        }

        .profile-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 8px;
        }

        .profile-subtitle {
            color: #5f6368;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-weight: 600;
            color: #202124;
            font-size: 0.95rem;
        }

        .form-input {
            padding: 12px 16px;
            border: 2px solid #dadce0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        .form-input:disabled {
            background-color: #f8f9fa;
            cursor: not-allowed;
        }

        .error-message {
            color: #ea4335;
            font-size: 0.85rem;
            margin-top: 5px;
        }

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
        }

        .verification-button {
            background: none;
            border: none;
            color: #1a73e8;
            font-size: 0.9rem;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            font-weight: 500;
        }

        .verification-button:hover {
            color: #0d47a1;
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

        .success-message i {
            font-size: 1.1rem;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            padding-top: 20px;
            border-top: 1px solid #e8f0fe;
        }

        .save-button {
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .save-button:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 115, 232, 0.2);
        }

        .save-button:active {
            transform: translateY(0);
        }

        .save-button i {
            font-size: 1rem;
        }

        .saved-message {
            background-color: #34a853;
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

        .saved-message i {
            font-size: 0.9rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .profile-section {
                padding: 20px;
            }
            
            .form-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            
            .save-button {
                width: 100%;
                justify-content: center;
            }
            
            .saved-message {
                text-align: center;
                justify-content: center;
            }
        }
    </style>

    <div class="profile-section">
        <header class="profile-header">
            <h2 class="profile-title">
                <i class="fas fa-user-circle" style="margin-right: 10px;"></i>
                {{ __('Profile Information') }}
            </h2>
            
            <p class="profile-subtitle">
                {{ __("Update your account's profile information, email, and other details.") }}
            </p>
        </header>

        <!-- Formulaire pour renvoyer le mail de vérification -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Formulaire de mise à jour du profil -->
        <form method="post" action="{{ route('profile.update') }}" class="profile-form">
            @csrf
            @method('patch')

            <!-- Nom -->
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user" style="margin-right: 8px; color: #1a73e8;"></i>
                    {{ __('Name') }}
                </label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    class="form-input"
                    value="{{ old('name', $user->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Enter your full name"
                />
                @error('name')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope" style="margin-right: 8px; color: #1a73e8;"></i>
                    {{ __('Email') }}
                </label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="form-input"
                    value="{{ old('email', $user->email) }}" 
                    required 
                    autocomplete="username"
                    placeholder="Enter your email address"
                />
                @error('email')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                        {{ $message }}
                    </div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="verification-notice">
                        <p class="verification-text">
                            <i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i>
                            {{ __('Your email address is unverified.') }}
                        </p>
                        
                        <button form="send-verification" class="verification-button">
                            <i class="fas fa-paper-plane" style="margin-right: 5px;"></i>
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <div class="success-message">
                                <i class="fas fa-check-circle"></i>
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Téléphone -->
            @if($user->role === 'patient' || $user->role === 'medecin')
                <div class="form-group">
                    <label for="telephone" class="form-label">
                        <i class="fas fa-phone" style="margin-right: 8px; color: #1a73e8;"></i>
                        {{ __('Telephone') }}
                    </label>
                    <input 
                        id="telephone" 
                        name="telephone" 
                        type="text" 
                        class="form-input"
                        value="{{ old('telephone', $user->telephone) }}" 
                        required
                        placeholder="Enter your phone number"
                    />
                    @error('telephone')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <!-- Adresse (médecin seulement) -->
            @if($user->role === 'medecin')
                <div class="form-group">
                    <label for="adresse" class="form-label">
                        <i class="fas fa-map-marker-alt" style="margin-right: 8px; color: #1a73e8;"></i>
                        {{ __('Adresse') }}
                    </label>
                    <input 
                        id="adresse" 
                        name="adresse" 
                        type="text" 
                        class="form-input"
                        value="{{ old('adresse', $user->adresse) }}" 
                        required
                        placeholder="Enter your address"
                    />
                    @error('adresse')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle" style="margin-right: 5px;"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <!-- Bouton enregistrer -->
            <div class="form-actions">
                <button type="submit" class="save-button">
                    <i class="fas fa-save"></i>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition
                         x-init="setTimeout(() => show = false, 2000)"
                         class="saved-message">
                        <i class="fas fa-check"></i>
                        {{ __('Changes saved successfully!') }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">