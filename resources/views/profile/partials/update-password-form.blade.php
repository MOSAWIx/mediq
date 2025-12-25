<section>
    <style>
        .password-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .password-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e8f0fe;
        }

        .password-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .password-subtitle {
            color: #5f6368;
            font-size: 0.95rem;
            line-height: 1.5;
            padding-left: 34px; /* Alignement avec l'icône du titre */
        }

        .password-form {
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
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .password-input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            padding-right: 45px; /* Espace pour l'icône */
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

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #5f6368;
            cursor: pointer;
            padding: 4px;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #1a73e8;
        }

        .password-strength {
            margin-top: 8px;
        }

        .strength-bar {
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 6px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .strength-weak .strength-fill {
            background: #ea4335;
            width: 25%;
        }

        .strength-fair .strength-fill {
            background: #fbbc05;
            width: 50%;
        }

        .strength-good .strength-fill {
            background: #34a853;
            width: 75%;
        }

        .strength-strong .strength-fill {
            background: #0d9d58;
            width: 100%;
        }

        .strength-text {
            font-size: 0.85rem;
            color: #5f6368;
        }

        .error-message {
            color: #ea4335;
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
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

        .password-hints {
            background-color: #f8f9fa;
            border: 1px solid #e8f0fe;
            border-radius: 8px;
            padding: 15px;
            margin-top: 5px;
        }

        .hints-title {
            font-weight: 600;
            color: #1a73e8;
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hints-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .hint-item {
            font-size: 0.85rem;
            color: #5f6368;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hint-item i {
            color: #34a853;
            font-size: 0.8rem;
        }

        .hint-item.invalid i {
            color: #ea4335;
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
            .password-section {
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

    <div class="password-section">
        <header class="password-header">
            <h2 class="password-title">
                <i class="fas fa-lock"></i>
                {{ __('Update Password') }}
            </h2>
            
            <p class="password-subtitle">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="password-form">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="form-group">
                <label for="update_password_current_password" class="form-label">
                    <i class="fas fa-key"></i>
                    {{ __('Current Password') }}
                </label>
                <div class="password-input-wrapper">
                    <input 
                        id="update_password_current_password" 
                        name="current_password" 
                        type="password" 
                        class="form-input"
                        autocomplete="current-password"
                        placeholder="Enter your current password"
                    />
                    <button type="button" class="toggle-password" data-target="update_password_current_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('current_password', 'updatePassword')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="form-group">
                <label for="update_password_password" class="form-label">
                    <i class="fas fa-lock"></i>
                    {{ __('New Password') }}
                </label>
                <div class="password-input-wrapper">
                    <input 
                        id="update_password_password" 
                        name="password" 
                        type="password" 
                        class="form-input"
                        autocomplete="new-password"
                        placeholder="Enter your new password"
                        oninput="checkPasswordStrength(this.value)"
                    />
                    <button type="button" class="toggle-password" data-target="update_password_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <!-- Password Strength Indicator -->
                <div class="password-strength" id="password-strength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strength-fill"></div>
                    </div>
                    <div class="strength-text" id="strength-text">Password strength</div>
                </div>

                <!-- Password Hints -->
                <div class="password-hints">
                    <div class="hints-title">
                        <i class="fas fa-lightbulb"></i>
                        Password Requirements
                    </div>
                    <ul class="hints-list">
                        <li class="hint-item" id="hint-length">
                            <i class="fas fa-times"></i>
                            At least 8 characters
                        </li>
                        <li class="hint-item" id="hint-uppercase">
                            <i class="fas fa-times"></i>
                            Contains uppercase letter
                        </li>
                        <li class="hint-item" id="hint-lowercase">
                            <i class="fas fa-times"></i>
                            Contains lowercase letter
                        </li>
                        <li class="hint-item" id="hint-number">
                            <i class="fas fa-times"></i>
                            Contains number
                        </li>
                        <li class="hint-item" id="hint-special">
                            <i class="fas fa-times"></i>
                            Contains special character
                        </li>
                    </ul>
                </div>
                
                @error('password', 'updatePassword')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="update_password_password_confirmation" class="form-label">
                    <i class="fas fa-lock"></i>
                    {{ __('Confirm Password') }}
                </label>
                <div class="password-input-wrapper">
                    <input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        class="form-input"
                        autocomplete="new-password"
                        placeholder="Confirm your new password"
                    />
                    <button type="button" class="toggle-password" data-target="update_password_password_confirmation">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password_confirmation', 'updatePassword')
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="form-actions">
                <button type="submit" class="save-button">
                    <i class="fas fa-save"></i>
                    {{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div x-data="{ show: true }"
                         x-show="show"
                         x-transition
                         x-init="setTimeout(() => show = false, 2000)"
                         class="saved-message">
                        <i class="fas fa-check"></i>
                        {{ __('Password updated successfully!') }}
                    </div>
                @endif
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });

            // Password strength checker function
            window.checkPasswordStrength = function(password) {
                const strengthBar = document.getElementById('password-strength');
                const strengthFill = document.getElementById('strength-fill');
                const strengthText = document.getElementById('strength-text');
                
                let strength = 0;
                let hints = {
                    length: false,
                    uppercase: false,
                    lowercase: false,
                    number: false,
                    special: false
                };

                // Check password length
                if (password.length >= 8) {
                    strength += 20;
                    hints.length = true;
                    document.getElementById('hint-length').classList.remove('invalid');
                    document.getElementById('hint-length').querySelector('i').className = 'fas fa-check';
                } else {
                    document.getElementById('hint-length').classList.add('invalid');
                    document.getElementById('hint-length').querySelector('i').className = 'fas fa-times';
                }

                // Check for uppercase letters
                if (/[A-Z]/.test(password)) {
                    strength += 20;
                    hints.uppercase = true;
                    document.getElementById('hint-uppercase').classList.remove('invalid');
                    document.getElementById('hint-uppercase').querySelector('i').className = 'fas fa-check';
                } else {
                    document.getElementById('hint-uppercase').classList.add('invalid');
                    document.getElementById('hint-uppercase').querySelector('i').className = 'fas fa-times';
                }

                // Check for lowercase letters
                if (/[a-z]/.test(password)) {
                    strength += 20;
                    hints.lowercase = true;
                    document.getElementById('hint-lowercase').classList.remove('invalid');
                    document.getElementById('hint-lowercase').querySelector('i').className = 'fas fa-check';
                } else {
                    document.getElementById('hint-lowercase').classList.add('invalid');
                    document.getElementById('hint-lowercase').querySelector('i').className = 'fas fa-times';
                }

                // Check for numbers
                if (/[0-9]/.test(password)) {
                    strength += 20;
                    hints.number = true;
                    document.getElementById('hint-number').classList.remove('invalid');
                    document.getElementById('hint-number').querySelector('i').className = 'fas fa-check';
                } else {
                    document.getElementById('hint-number').classList.add('invalid');
                    document.getElementById('hint-number').querySelector('i').className = 'fas fa-times';
                }

                // Check for special characters
                if (/[^A-Za-z0-9]/.test(password)) {
                    strength += 20;
                    hints.special = true;
                    document.getElementById('hint-special').classList.remove('invalid');
                    document.getElementById('hint-special').querySelector('i').className = 'fas fa-check';
                } else {
                    document.getElementById('hint-special').classList.add('invalid');
                    document.getElementById('hint-special').querySelector('i').className = 'fas fa-times';
                }

                // Update strength indicator
                strengthFill.style.width = strength + '%';
                
                // Update strength class and text
                strengthBar.className = 'password-strength';
                if (strength <= 25) {
                    strengthBar.classList.add('strength-weak');
                    strengthText.textContent = 'Weak password';
                } else if (strength <= 50) {
                    strengthBar.classList.add('strength-fair');
                    strengthText.textContent = 'Fair password';
                } else if (strength <= 75) {
                    strengthBar.classList.add('strength-good');
                    strengthText.textContent = 'Good password';
                } else {
                    strengthBar.classList.add('strength-strong');
                    strengthText.textContent = 'Strong password!';
                }
            };
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</section>