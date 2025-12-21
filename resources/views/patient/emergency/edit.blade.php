<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Contact d’urgence</title>

    {{-- نفس CSS ديال rendez-vous --}}
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
            --radius: 16px;
            --shadow: 0 8px 30px rgba(0, 87, 146, 0.1);
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, #0d47a1 100%);
            color: white;
            height: 100vh;
            position: fixed;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .menu-title {
            font-size: .8rem;
            padding: 10px 20px;
            color: rgba(255,255,255,.7);
            text-transform: uppercase;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            gap: 12px;
            color: white;
            text-decoration: none;
            border-left: 3px solid transparent;
        }

        .menu-item.active,
        .menu-item:hover {
            background: rgba(255,255,255,.15);
            border-left-color: var(--accent);
        }

        /* Main */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            height: var(--header-height);
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }

        /* Content */
        .content {
            padding: 30px;
        }

        .form-container {
            background: white;
            border-radius: var(--radius);
            padding: 30px;
            box-shadow: var(--shadow);
            max-width: 600px;
        }

        .form-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--danger);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 2px solid var(--gray-light);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn {
            background: var(--danger);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background: #c23321;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(52,168,83,.1);
            color: var(--secondary);
        }
    </style>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h1><i class="fas fa-heartbeat"></i> SantéPlus</h1>
    </div>

    <div class="sidebar-menu">
        <div class="menu-title">Espace Patient</div>

        <a href="{{ route('dashboard.patient') }}" class="menu-item">
            <i class="fas fa-home"></i> Tableau de bord
        </a>

        <a href="{{ route('patient.rendez_vous.index') }}" class="menu-item">
            <i class="fas fa-calendar-check"></i> Mes Rendez-vous
        </a>

        <a href="{{ route('traitements.index') }}" class="menu-item">
            <i class="fas fa-pills"></i> Mes Traitements
        </a>

        <a href="{{ route('patient.emergency.edit') }}"
           class="menu-item active">
            <i class="fas fa-phone-alt"></i> Contact d’urgence
        </a>
    </div>
</div>

<!-- Main -->
<div class="main-content">

    <!-- Navbar -->
    <div class="navbar">
        <h2>Contact d’urgence</h2>

        <div>
            {{ Auth::user()->name }}
        </div>
    </div>

    <!-- Content -->
    <div class="content">

        <div class="form-container">

            <h2 class="form-title">
                <i class="fas fa-phone-alt"></i>
                Contact d’urgence
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST"
                  action="{{ route('patient.emergency.update') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nom complet</label>
                    <input type="text"
                           name="emergency_name"
                           class="form-input"
                           value="{{ old('emergency_name', $patient->emergency_name ?? '') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="text"
                           name="emergency_phone"
                           class="form-input"
                           value="{{ old('emergency_phone', $patient->emergency_phone ?? '') }}"
                           required>
                </div>

                <div class="form-group">
                    <label class="form-label">Relation</label>
                    <input type="text"
                           name="emergency_relation"
                           class="form-input"
                           value="{{ old('emergency_relation', $patient->emergency_relation ?? '') }}"
                           required>
                </div>

                <button class="btn">
                    <i class="fas fa-save"></i>
                    Enregistrer
                </button>
            </form>

        </div>

    </div>
</div>

</body>
</html>
