<div class="healthcare-form-container">
    <div class="healthcare-form">
        <div class="form-header">
            <div class="health-icon">
                <!-- Vous pouvez ajouter une icône santé ici -->
            </div>
            <h2>Créer un compte</h2>
            <p>Choisissez votre rôle :</p>
        </div>

        <div class="role-selection">
            <!-- Patient Card -->
            <div class="role-card">
                <div class="role-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 21V19C20 16.7909 18.2091 15 16 15H8C5.79086 15 4 16.7909 4 19V21" stroke="#1a73e8" stroke-width="2" stroke-linecap="round"/>
                        <circle cx="12" cy="7" r="4" stroke="#1a73e8" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Patient</h3>
                <p>Recherchez et consultez des médecins</p>
                <a href="{{ route('register.patient') }}" class="role-btn patient-btn">
                    <span>S'INSCRIRE EN TANT QUE PATIENT</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <!-- Médecin Card -->
            <div class="role-card">
                <div class="role-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.8284 14.8284C13.2663 16.3905 10.7337 16.3905 9.17157 14.8284C7.60948 13.2663 7.60948 10.7337 9.17157 9.17157C10.7337 7.60948 13.2663 7.60948 14.8284 9.17157C16.3905 10.7337 16.3905 13.2663 14.8284 14.8284Z" stroke="#34a853" stroke-width="2"/>
                        <path d="M12 8V12M12 12V16M12 12H16M12 12H8" stroke="#34a853" stroke-width="2"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#34a853" stroke-width="2"/>
                    </svg>
                </div>
                <h3>Médecin</h3>
                <p>Proposez vos services médicaux</p>
                <a href="{{ route('register.medecin') }}" class="role-btn medecin-btn">
                    <span>S'INSCRIRE EN TANT QUE MÉDECIN</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="separator"></div>

       
    </div>
</div>

<style>
.healthcare-form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 2rem;
    background: linear-gradient(135deg, #f0f7ff 0%, #e8f4ff 100%);
}

.healthcare-form {
    max-width: 700px;
    width: 100%;
    padding: 2rem 2.5rem;
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
    border: 1px solid #e8f4ff;
    min-height: auto;
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.form-header h2 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1a73e8;
    margin-bottom: 0.5rem;
}

.form-header p {
    color: #5f6368;
    font-size: 1rem;
    margin-bottom: 0;
}

.role-selection {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1rem;
}

.role-card {
    background: #f8fafc;
    border: 2px solid #e8f0fe;
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
}

.role-card:hover {
    transform: translateY(-2px);
    border-color: #1a73e8;
    box-shadow: 0 6px 20px rgba(26, 115, 232, 0.15);
}

.role-icon {
    margin-bottom: 1rem;
    padding: 0.5rem;
    background: white;
    border-radius: 12px;
    border: 2px solid #e8f0fe;
}

.role-card h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1a73e8;
    margin-bottom: 0.5rem;
}

.role-card p {
    color: #5f6368;
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.role-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.75rem 1.25rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
    width: 100%;
    border: none;
    cursor: pointer;
    height: 44px;
}

.patient-btn {
    background: linear-gradient(135deg, #1a73e8, #34a853);
    color: white;
}

.medecin-btn {
    background: linear-gradient(135deg, #34a853, #1a73e8);
    color: white;
}

.role-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(26, 115, 232, 0.25);
    color: white;
    text-decoration: none;
}

.role-btn svg {
    transition: transform 0.3s ease;
}

.role-btn:hover svg {
    transform: translateX(3px);
}

.separator {
    height: 1px;
    background: #e8f0fe;
    margin: 1.5rem 0;
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

/* Responsive */
@media (max-width: 768px) {
    .healthcare-form-container {
        padding: 1rem;
    }
    
    .healthcare-form {
        max-width: 500px;
        padding: 1.5rem 2rem;
        margin: 1rem;
    }
    
    .role-selection {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

@media (max-width: 480px) {
    .healthcare-form {
        padding: 1.25rem 1.5rem;
        margin: 0.5rem;
    }
    
    .role-card {
        padding: 1.5rem 1rem;
    }
    
    .role-card h3 {
        font-size: 1.2rem;
    }
    
    .role-btn {
        font-size: 0.8rem;
        padding: 0.65rem 1rem;
    }
}
</style>