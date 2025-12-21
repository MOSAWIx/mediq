<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="healthcare-form">
        @csrf

        <div class="form-header">
            <div class="health-icon">
                
            </div>
            <h2>Connexion</h2>
            <p>Accédez à votre espace santé</p>
        </div>

        <!-- Email Address -->
        <div class="input-group">
            <label for="email" class="input-label">Adresse email</label>
            <div class="input-wrapper">
                <input id="email" class="text-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="votre@email.com">
                <span class="input-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M22 6L12 13L2 6" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </span>
            </div>
            <div class="error-message">
                @if($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </div>
        </div>

        <!-- Password -->
        <div class="input-group">
            <label for="password" class="input-label">Mot de passe</label>
            <div class="input-wrapper">
                <input id="password" class="text-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                <span class="input-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2"/>
                        <path d="M17 7.5V7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7V7.5M5 10.5C5 9.67157 5.67157 9 6.5 9H17.5C18.3284 9 19 9.67157 19 10.5V19.5C19 20.3284 18.3284 21 17.5 21H6.5C5.67157 21 5 20.3284 5 19.5V10.5Z" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </span>
            </div>
            <div class="error-message">
                @if($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </div>
        </div>

        <!-- Remember Me -->
        <div class="remember-group">
            <label for="remember_me" class="remember-label">
                <input id="remember_me" type="checkbox" class="remember-checkbox" name="remember">
                <span class="remember-text">Se souvenir de moi</span>
            </label>
        </div>

        <div class="separator"></div>

        <div class="form-footer">
            @if (Route::has('password.request'))
                <a class="forgot-link" href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif

            <button type="submit" class="submit-btn">
                <span>SE CONNECTER</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </form>
</x-guest-layout>

<style>
/* Style pour s'assurer que tout le formulaire est visible */
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

x-guest-layout {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #e8f0fe 100%);
}

.healthcare-form {
    width: 100%;
    max-width: 450px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
    border: 1px solid #e8f4ff;
    padding: 1.5rem 2rem;
    height: auto;
    overflow: visible;
}

.form-header {
    text-align: center;
    margin-bottom: 1rem;
}


.form-header h2 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1a73e8;
    margin-bottom: 0.2rem;
}

.form-header p {
    color: #5f6368;
    font-size: 0.85rem;
    margin-bottom: 0;
}

.input-group {
    margin-bottom: 0.6rem;
}

.input-label {
    display: block;
    margin-bottom: 0.3rem;
    font-weight: 600;
    color: #1a73e8;
    font-size: 0.8rem;
}

.input-wrapper {
    position: relative;
}

.text-input {
    width: 100%;
    padding: 0.6rem 1rem 0.6rem 2.5rem;
    border: 2px solid #e8f0fe;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: #f8fafc;
    box-sizing: border-box;
    height: 42px;
}

.text-input:focus {
    outline: none;
    border-color: #1a73e8;
    background: white;
    box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
}

.input-icon {
    position: absolute;
    left: 0.8rem;
    top: 50%;
    transform: translateY(-50%);
    color: #1a73e8;
}

.error-message {
    color: #d93025;
    font-size: 0.7rem;
    margin-top: 0.2rem;
    font-weight: 500;
    min-height: 0.8rem;
}

.remember-group {
    margin: 0.8rem 0;
}

.remember-label {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.remember-checkbox {
    width: 18px;
    height: 18px;
    border: 2px solid #e8f0fe;
    border-radius: 4px;
    background: #f8fafc;
    margin-right: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.remember-checkbox:checked {
    background: #1a73e8;
    border-color: #1a73e8;
}

.remember-text {
    color: #5f6368;
    font-size: 0.85rem;
    font-weight: 500;
}

.separator {
    height: 1px;
    background: #e8f0fe;
    margin: 1rem 0;
}

.form-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 0.5rem;
}

.forgot-link {
    color: #1a73e8;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
    font-size: 0.85rem;
}

.forgot-link:hover {
    color: #34a853;
    text-decoration: underline;
}

.submit-btn {
    background: linear-gradient(135deg, #1a73e8, #34a853);
    color: white;
    border: none;
    padding: 0.6rem 1.1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    height: 38px;
}

.submit-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(26, 115, 232, 0.25);
}

.submit-btn svg {
    transition: transform 0.3s ease;
}

.submit-btn:hover svg {
    transform: translateX(3px);
}

/* Session Status */
.mb-4 {
    margin-bottom: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    font-size: 0.9rem;
    text-align: center;
}

.mb-4:not(:empty) {
    background: #e8f0fe;
    color: #1a73e8;
    border: 1px solid #1a73e8;
}

/* Responsive pour les très petits écrans */
@media (max-width: 480px) {
    x-guest-layout {
        padding: 15px;
        align-items: flex-start;
    }
    
    .healthcare-form {
        padding: 1.25rem 1.5rem;
        margin-top: 1rem;
    }
    
    .form-footer {
        flex-direction: column;
        gap: 0.8rem;
        align-items: stretch;
    }
    
    .forgot-link {
        text-align: center;
        order: 2;
    }
    
    .submit-btn {
        order: 1;
        justify-content: center;
    }
}
</style>