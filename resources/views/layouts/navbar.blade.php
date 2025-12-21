<div class="navbar">
    <div class="navbar-left">
        <h2>Mon Tableau de bord</h2>
    </div>
    <div class="navbar-right">
        <button class="emergency-btn" id="emergencyBtn">
            <i class="fas fa-phone-alt"></i>
            <span>Urgence</span>
        </button>
        <div class="user-profile" id="userProfile">
            <div class="user-avatar">{{ Auth::user()->name[0] }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Patient</div>
            </div>
            <i class="fas fa-chevron-down"></i>
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user"></i> <span>Mon Profil</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Navbar style basé sur ton dernier fichier */
.navbar {
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    padding: 1rem 2rem;
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.navbar-left h2 {
    color: #1a73e8;
}

.emergency-btn {
    background: linear-gradient(135deg, #1a73e8, #34a853);
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    cursor: pointer;
}

.user-profile {
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
}

.user-avatar {
    background: #1a73e8;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 700;
    margin-right: 0.5rem;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 50px;
    right: 0;
    background: #fff;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
}

.user-profile:hover .dropdown-menu {
    display: block;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    text-decoration: none;
    color: #202124;
    transition: background 0.3s;
}

.dropdown-item:hover {
    background: #f0f0f0;
}
</style>

<script>
// Dropdown user menu
const userProfile = document.getElementById('userProfile');
const dropdownMenu = document.getElementById('dropdownMenu');

if(userProfile) {
    userProfile.addEventListener('click', () => {
        dropdownMenu.classList.toggle('show');
    });
}
</script>
