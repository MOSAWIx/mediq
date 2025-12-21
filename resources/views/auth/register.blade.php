<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="healthcare-form">
        @csrf

        <div class="form-header">
            <div class="health-icon">
               
            </div>
            <h2>Créer votre compte</h2>
            <p>Rejoignez notre communauté santé</p>
        </div>

        <!-- Name -->
        <div class="input-group">
            <label for="name" class="input-label">Nom complet</label>
            <div class="input-wrapper">
                <input id="name" class="text-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Votre nom complet">
                <span class="input-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </span>
            </div>
            <div class="error-message">
                @if($errors->has('name'))
                    {{ $errors->first('name') }}
                @endif
            </div>
        </div>

        <!-- Email Address -->
        <div class="input-group">
            <label for="email" class="input-label">Adresse email</label>
            <div class="input-wrapper">
                <input id="email" class="text-input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="votre@email.com">
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
                <input id="password" class="text-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
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

        <!-- Confirm Password -->
        <div class="input-group">
            <label for="password_confirmation" class="input-label">Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <input id="password_confirmation" class="text-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                <span class="input-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M12 3C13.1956 3 14.3556 3.31607 15.3631 3.91015C16.3706 4.50424 17.1855 5.35374 17.7165 6.36763C18.2476 7.38153 18.4744 8.51883 18.3721 9.65278C18.2698 10.7867 17.8425 11.8704 17.1365 12.7775C16.4305 13.6846 15.4739 14.379 14.3774 14.7785C13.2809 15.1781 12.0879 15.2667 10.9435 15.0345C9.79906 14.8023 8.74969 14.2589 7.91677 13.4693C7.08385 12.6797 6.50096 11.6763 6.23715 10.5771C5.97334 9.47795 6.03953 8.32898 6.42765 7.26699" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
            </div>
            <div class="error-message">
                @if($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                @endif
            </div>
        </div>

        <div class="separator"></div>

        <div class="form-footer">
            <a class="login-link" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <button type="submit" class="submit-btn">
                <span>CRÉER MON COMPTE</span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </form>
</x-guest-layout>

<style>
.healthcare-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem 2.5rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
    border: 1px solid #e8f4ff;
    min-height: auto;
}

.form-header {
    text-align: center;
    margin-bottom: 1rem;
}

.form-header h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a73e8;
    margin-bottom: 0.25rem;
}

.form-header p {
    color: #5f6368;
    font-size: 0.9rem;
    margin-bottom: 0;
}

/* SUPPRIMER LES ESPACES ENTRE LES CHAMPS */
.input-group {
    margin-bottom: 0;
}

.input-label {
    display: block;
    margin-bottom: 0rem;
    font-weight: 600;
    color: #1a73e8;
    font-size: 0.85rem;
}

.input-wrapper {
    position: relative;
}

.text-input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.75rem;
    border: 2px solid #e8f0fe;
    border-radius: 10px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background: #f8fafc;
    box-sizing: border-box;
    height: 48px;
    margin-bottom: 0;
}

.text-input:focus {
    outline: none;
    border-color: #1a73e8;
    background: white;
    box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
}

.input-icon {
    position: absolute;
    left: 0.875rem;
    top: 50%;
    transform: translateY(-50%);
    color: #1a73e8;
}

.error-message {
    color: #d93025;
    font-size: 0.8rem;
    margin-top: 0.3rem;
    font-weight: 500;
    min-height: 1rem;
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
    margin-top: 1rem;
}

.login-link {
    color: #1a73e8;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
    font-size: 0.9rem;
}

.login-link:hover {
    color: #34a853;
    text-decoration: underline;
}

.submit-btn {
    background: linear-gradient(135deg, #1a73e8, #34a853);
    color: white;
    border: none;
    padding: 0.75rem 1.25rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    height: 44px;
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

/* Responsive */
@media (max-width: 768px) {
    .healthcare-form {
        max-width: 500px;
        padding: 1.5rem 2rem;
        margin: 1rem;
    }
}

@media (max-width: 480px) {
    .healthcare-form {
        padding: 1.25rem 1.5rem;
        margin: 0.5rem;
    }
    
    .form-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .login-link {
        text-align: center;
        order: 2;
    }
    
    .submit-btn {
        order: 1;
        justify-content: center;
    }
}
</style>