<div class="sidebar">
    <div class="sidebar-header">
        <h1><i class="fas fa-heartbeat"></i> <span>SantéPlus</span></h1>
    </div>
    <div class="sidebar-menu">
        <div class="menu-section">
            <div class="menu-title">Espace Patient</div>
            <ul class="menu-items">
                <a href="{{ url('/dashboard') }}" class="menu-item active">
                    <i class="fas fa-home"></i> <span>Tableau de bord</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-calendar-check"></i> <span>Mes Rendez-vous</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-pills"></i> <span>Mes Traitements</span>
                </a>
            </ul>
        </div>
        <div class="menu-section">
            <div class="menu-title">Mon Compte</div>
            <ul class="menu-items">
                <a href="{{ route('profile.edit') }}" class="menu-item">
                    <i class="fas fa-user-cog"></i> <span>Mon Profil</span>
                </a>
            </ul>
        </div>
    </div>
</div>

<style>
/* Sidebar style basé sur ton dernier fichier */
.sidebar {
    width: 250px;
    background: linear-gradient(135deg, #1a73e8, #34a853);
    color: #fff;
    min-height: 100vh;
    padding: 2rem 1rem;
    position: fixed;
}

.sidebar-header h1 {
    font-size: 1.8rem;
    font-weight: 700;
}

.sidebar-header h1 span {
    color: #fbbc05;
}

.menu-title {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: 600;
    font-size: 0.9rem;
    opacity: 0.8;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border-radius: 8px;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s;
}

.menu-item:hover,
.menu-item.active {
    background: rgba(255,255,255,0.2);
}
</style>
