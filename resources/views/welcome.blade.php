<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SantéPlus') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            /* Styles modernes pour site de santé */
            :root {
                --primary: #1a73e8;
                --primary-light: #e8f0fe;
                --secondary: #34a853;
                --accent: #fbbc05;
                --text: #202124;
                --text-light: #5f6368;
                --background: #f8fafc;
                --white: #ffffff;
                --border: #dadce0;
                --error: #d93025;
                --shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
                --radius: 16px;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: 'Instrument Sans', sans-serif;
                background: linear-gradient(135deg, #1a73e8 0%, #34a853 100%);
                color: var(--text);
                line-height: 1.6;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* Navigation Bar */
            .navbar {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                padding: 1rem 2rem;
                box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
            }

            .nav-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--primary);
                text-decoration: none;
            }

            .logo span {
                color: var(--secondary);
            }

            .nav-menu {
                display: flex;
                gap: 2rem;
                align-items: center;
            }

            .nav-links {
                display: flex;
                gap: 2rem;
                list-style: none;
            }

            .nav-link {
                color: var(--text);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s ease;
                padding: 0.5rem 0;
                cursor: pointer;
            }

            .nav-link:hover {
                color: var(--primary);
            }

            .auth-links {
                display: flex;
                gap: 1rem;
                align-items: center;
            }

            .auth-link {
                padding: 0.5rem 1.2rem;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .auth-link.login {
                color: var(--primary);
                border: 1px solid var(--primary);
            }

            .auth-link.login:hover {
                background: var(--primary);
                color: var(--white);
            }

            .auth-link.register {
                background: var(--primary);
                color: var(--white);
                border: 1px solid var(--primary);
            }

            .auth-link.register:hover {
                background: var(--secondary);
                border-color: var(--secondary);
                transform: translateY(-2px);
            }

            /* Sections */
            section {
                padding: 5rem 2rem;
            }

            .section-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            /* Hero Section */
            .hero-section {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: white;
                padding-top: 80px;
            }

            .hero-content {
                max-width: 800px;
            }

            .hero-title {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1rem;
                line-height: 1.2;
            }

            .hero-subtitle {
                font-size: 1.25rem;
                margin-bottom: 2rem;
                opacity: 0.9;
                line-height: 1.6;
            }

            .hero-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .hero-btn {
                padding: 0.75rem 2rem;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                border: 2px solid white;
            }

            .hero-btn.primary {
                background: white;
                color: var(--primary);
            }

            .hero-btn.primary:hover {
                background: transparent;
                color: white;
            }

            .hero-btn.secondary {
                background: transparent;
                color: white;
            }

            .hero-btn.secondary:hover {
                background: white;
                color: var(--primary);
            }

            /* Search Section */
            .search-section {
                background: white;
                padding: 4rem 2rem;
            }

            .search-container {
                max-width: 800px;
                margin: 0 auto;
                text-align: center;
            }

            .search-title {
                font-size: 2.5rem;
                color: var(--primary);
                margin-bottom: 3rem;
                font-weight: 700;
            }

            .search-box {
                background: var(--white);
                padding: 3rem;
                border-radius: var(--radius);
                box-shadow: var(--shadow);
                border: 1px solid var(--border);
            }

            .search-form {
                display: grid;
                grid-template-columns: 1fr 1fr auto;
                gap: 1.5rem;
                align-items: end;
            }

            .form-group {
                text-align: left;
            }

            .form-label {
                display: block;
                margin-bottom: 0.75rem;
                font-weight: 600;
                color: var(--primary);
                font-size: 1rem;
            }

            .form-select, .form-input {
                width: 100%;
                padding: 1rem;
                border: 2px solid var(--border);
                border-radius: 10px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background: var(--white);
            }

            .form-select:focus, .form-input:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
            }

            .search-btn {
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: white;
                border: none;
                padding: 1rem 2rem;
                border-radius: 10px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                height: fit-content;
                font-size: 1rem;
            }

            .search-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 10px 25px rgba(26, 115, 232, 0.3);
            }

            /* Features Section */
            .features-section {
                background: var(--primary-light);
            }

            .section-title {
                text-align: center;
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--primary);
                margin-bottom: 3rem;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }

            .feature-card {
                background: var(--white);
                padding: 2.5rem;
                border-radius: var(--radius);
                box-shadow: var(--shadow);
                text-align: center;
                transition: all 0.3s ease;
                border: 1px solid transparent;
            }

            .feature-card:hover {
                transform: translateY(-8px);
                border-color: var(--primary);
                box-shadow: 0 15px 40px rgba(0, 87, 146, 0.15);
            }

            .feature-icon {
                width: 80px;
                height: 80px;
                margin: 0 auto 1.5rem;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 2rem;
            }

            .feature-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--primary);
                margin-bottom: 1rem;
            }

            .feature-description {
                color: var(--text-light);
                line-height: 1.6;
                font-size: 1.05rem;
            }

            /* About Section */
            .about-section {
                background: white;
            }

            .about-content {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: center;
            }

            .about-text h2 {
                font-size: 2.5rem;
                color: var(--primary);
                margin-bottom: 1.5rem;
                font-weight: 700;
            }

            .about-text p {
                color: var(--text-light);
                margin-bottom: 1.5rem;
                font-size: 1.1rem;
                line-height: 1.7;
            }

            .about-stats {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
                text-align: center;
                margin-top: 2rem;
            }

            .stat-number {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--primary);
                display: block;
            }

            .stat-label {
                color: var(--text-light);
                font-size: 0.9rem;
                font-weight: 500;
            }

            /* Team Image Styles */
            .team-image-container {
                position: relative;
                border-radius: var(--radius);
                overflow: hidden;
                box-shadow: var(--shadow);
                height: 400px;
                background: linear-gradient(135deg, var(--primary), var(--secondary));
            }

            .team-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .team-image:hover {
                transform: scale(1.05);
            }

            .team-image-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
                padding: 2rem;
                color: white;
                text-align: center;
            }

            .team-image-title {
                font-size: 1.2rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .team-image-subtitle {
                font-size: 0.9rem;
                opacity: 0.9;
            }

            /* Fallback if image doesn't load */
            .team-image-fallback {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                color: white;
                text-align: center;
                padding: 2rem;
            }

            .team-image-fallback-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }

            .team-image-fallback-text {
                font-size: 1.1rem;
                font-weight: 500;
            }

            /* Footer */
            .footer {
                background: var(--primary);
                color: white;
                padding: 3rem 2rem 1rem;
                margin-top: auto;
            }

            .footer-container {
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: 2fr 1fr 1fr;
                gap: 3rem;
            }

            .footer-logo {
                font-size: 1.8rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .footer-logo span {
                color: var(--accent);
            }

            .footer-description {
                opacity: 0.9;
                line-height: 1.6;
                margin-bottom: 1.5rem;
            }

            .footer-heading {
                font-size: 1.2rem;
                font-weight: 600;
                margin-bottom: 1.5rem;
                color: var(--accent);
            }

            .footer-links {
                list-style: none;
            }

            .footer-link {
                color: white;
                text-decoration: none;
                opacity: 0.8;
                transition: opacity 0.3s ease;
                display: block;
                margin-bottom: 0.75rem;
            }

            .footer-link:hover {
                opacity: 1;
            }

            .footer-bottom {
                text-align: center;
                margin-top: 3rem;
                padding-top: 2rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                opacity: 0.7;
                font-size: 0.9rem;
            }

            /* Mobile Menu */
            .menu-toggle {
                display: none;
                flex-direction: column;
                cursor: pointer;
            }

            .menu-toggle span {
                width: 25px;
                height: 3px;
                background: var(--primary);
                margin: 3px 0;
                transition: 0.3s;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .navbar {
                    padding: 1rem;
                }

                .menu-toggle {
                    display: flex;
                }

                .nav-menu {
                    position: fixed;
                    top: 70px;
                    left: -100%;
                    width: 100%;
                    background: var(--white);
                    flex-direction: column;
                    gap: 0;
                    transition: 0.3s;
                    box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                    padding: 2rem 0;
                }

                .nav-menu.active {
                    left: 0;
                }

                .nav-links {
                    flex-direction: column;
                    gap: 1rem;
                    width: 100%;
                    text-align: center;
                }

                .auth-links {
                    flex-direction: column;
                    gap: 1rem;
                    width: 100%;
                    padding: 1rem;
                }

                .auth-link {
                    width: 100%;
                    text-align: center;
                }

                .hero-title {
                    font-size: 2rem;
                }

                .hero-subtitle {
                    font-size: 1.1rem;
                }

                .hero-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .hero-btn {
                    width: 200px;
                }

                .section-title, .search-title {
                    font-size: 2rem;
                }

                .search-form {
                    grid-template-columns: 1fr;
                }

                .about-content {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                }

                .about-stats {
                    grid-template-columns: repeat(2, 1fr);
                }

                .team-image-container {
                    height: 300px;
                }

                .footer-container {
                    grid-template-columns: 1fr;
                    gap: 2rem;
                    text-align: center;
                }
            }

            @media (max-width: 480px) {
                .about-stats {
                    grid-template-columns: 1fr;
                }
                
                section {
                    padding: 3rem 1rem;
                }

                .search-box {
                    padding: 2rem;
                }

                .feature-card {
                    padding: 2rem;
                }

                .team-image-container {
                    height: 250px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="nav-container">
                <a href="#accueil" class="logo">
                    Santé<span>Plus</span>
                </a>

                <div class="menu-toggle" id="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="nav-menu" id="nav-menu">
                    <ul class="nav-links">
                        <li><a href="#accueil" class="nav-link">Accueil</a></li>
                        <li><a href="#services" class="nav-link">Nos services</a></li>
                        <li><a href="#apropos" class="nav-link">À propos</a></li>
                    </ul>

                    <div class="auth-links">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="auth-link register">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="auth-link login">
                                Se connecter
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="auth-link register">
                                    S'inscrire
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="accueil" class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Votre santé, notre priorité</h1>
                <p class="hero-subtitle">
                    Rejoignez SantéPlus pour une gestion simplifiée de votre santé. 
                   Gérez vos traitements, prenez rendez-vous en ligne.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="hero-btn primary">
                        Commencer maintenant
                    </a>
                    <a href="#recherche" class="hero-btn secondary">
                        Trouver un médecin
                    </a>
                </div>
            </div>
        </section>

        <!-- Search Section -->
        <section id="recherche" class="search-section">
            <div class="search-container">
                <h2 class="search-title">Trouvez le médecin qu'il vous faut</h2>
                <div class="search-box">
                    <form id="search-form" class="search-form">
                        <div class="form-group">
                            <label class="form-label" for="specialite">Spécialité médicale</label>
                            <select id="specialite" class="form-select" name="specialite">
                                <option value="">Choisir une spécialité</option>
                                <option value="cardiologue">Cardiologie</option>
                                <option value="dermatologue">Dermatologie</option>
                                <option value="pediatre">Pédiatrie</option>
                                <option value="gynecologue">Gynécologie</option>
                                <option value="generaliste">Médecine Générale</option>
                                <option value="dentiste">Dentisterie</option>
                                <option value="ophtalmologue">Ophtalmologie</option>
                                <option value="orthopediste">Orthopédie</option>
                                <option value="psychiatre">Psychiatrie</option>
                                <option value="chirurgien">Chirurgie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="adresse">Ville ou région</label>
                            <input type="text" id="adresse" name="adresse" class="form-input" placeholder="Ex: Casablanca, Rabat, Marrakech...">
                        </div>
                        <button type="submit" class="search-btn">Rechercher</button>
                    </form>

                    <!-- Résultats -->
                    <div id="search-results" class="search-results"></div>
                </div>
            </div>
        </section>


        <!-- Features Section -->
        <section id="services" class="features-section">
            <div class="section-container">
                <h2 class="section-title">Nos services</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">📅</div>
                        <h3 class="feature-title">Rendez-vous en ligne</h3>
                        <p class="feature-description">
                            Prenez rendez-vous facilement avec nos professionnels de santé. 
                            Gérez vos consultations et recevez des rappels automatiques.
                        </p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💊</div>
                        <h3 class="feature-title">Suivi médical</h3>
                        <p class="feature-description">
                            Suivez votre traitement médical avec précision. 
                            Recevez des alertes pour vos médicaments et suivre votre évolution.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="apropos" class="about-section">
            <div class="section-container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>À propos de SantéPlus</h2>
                        <p>
                            SantéPlus est une plateforme innovante dédiée à la gestion de votre santé. 
                            Nous mettons à votre disposition des outils modernes pour faciliter vos 
                            démarches médicales et améliorer votre expérience de soins.
                        </p>
                        <p>
                            Notre mission est de rendre la santé accessible à tous grâce à une 
                            technologie de pointe et une équipe de professionnels dévoués.
                        </p>
                        <div class="about-stats">
                            <div class="stat">
                                <span class="stat-number">10K+</span>
                                <span class="stat-label">Patients satisfaits</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">200+</span>
                                <span class="stat-label">Médecins partenaires</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Support disponible</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-image-container">
                        <img src="{{ asset('equipe.png') }}" alt="Notre équipe médicale SantéPlus" class="team-image" 
                             onerror="this.style.display='none'; document.getElementById('team-fallback').style.display='flex';">
                        <div id="team-fallback" class="team-image-fallback" style="display: none;">
                            <div class="team-image-fallback-icon">👨‍⚕️👩‍⚕️</div>
                            <div class="team-image-fallback-text">Notre équipe médicale dévouée</div>
                        </div>
                        <div class="team-image-overlay">
                            <div class="team-image-title">Notre Équipe Médicale</div>
                            <div class="team-image-subtitle">Professionnels dévoués à votre santé</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-info">
                    <div class="footer-logo">Santé<span>Plus</span></div>
                    <p class="footer-description">
                        Votre partenaire santé de confiance. Nous nous engageons à vous offrir 
                        les meilleurs services médicaux avec une technologie innovante.
                    </p>
                </div>
                
                <div class="footer-links-section">
                    <h3 class="footer-heading">Liens rapides</h3>
                    <ul class="footer-links">
                        <li><a href="#accueil" class="footer-link">Accueil</a></li>
                        <li><a href="#services" class="footer-link">Nos services</a></li>
                        <li><a href="#apropos" class="footer-link">À propos</a></li>
                    </ul>
                </div>
                
                <div class="footer-links-section">
                    <h3 class="footer-heading">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#services" class="footer-link">Rendez-vous en ligne</a></li>
                        <li><a href="#services" class="footer-link">Suivi médical</a></li>
                        <li><a href="{{ route('login') }}" class="footer-link">Espace patient</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 SantéPlus. Tous droits réservés.</p>
            </div>
        </footer>

        <script>
            // Mobile menu toggle
            const mobileMenu = document.getElementById('mobile-menu');
            const navMenu = document.getElementById('nav-menu');

            if (mobileMenu && navMenu) {
                mobileMenu.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                    navMenu.classList.toggle('active');
                });

                // Close menu when clicking on a link
                document.querySelectorAll('.nav-link, .auth-link').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.remove('active');
                        navMenu.classList.remove('active');
                    });
                });
            }

            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Search form submission
            document.querySelector('.search-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const specialite = document.getElementById('specialite').value;
                const ville = document.getElementById('ville').value;
                
                if (specialite && ville) {
                    alert(`Recherche de ${specialite} à ${ville} - Cette fonctionnalité sera implémentée bientôt!`);
                    // Ici vous pouvez ajouter la logique de recherche réelle
                } else {
                    alert('Veuillez remplir tous les champs de recherche');
                }
            });
        </script>
    </body>
</html>