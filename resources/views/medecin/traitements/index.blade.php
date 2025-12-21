<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Suivi des traitements</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* ====== نفس الستايل ديال patient (مختصر باش ما نعاودش كلشي) ====== */
        body {
            background:#f5f7fa;
            font-family:'Segoe UI',sans-serif;
            margin:0;
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:260px;
            background:linear-gradient(180deg,#1a73e8,#0d47a1);
            color:#fff;
            position:fixed;
            height:100vh;
        }

        .sidebar-header{
            padding:20px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.1);
        }

        .menu-item{
            display:flex;
            gap:10px;
            padding:12px 20px;
            color:white;
            text-decoration:none;
        }

        .menu-item.active,
        .menu-item:hover{
            background:rgba(255,255,255,.15);
        }

        .main-content{
            margin-left:260px;
            flex:1;
            display:flex;
            flex-direction:column;
        }

        .navbar{
            background:white;
            padding:15px 30px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        .content{ padding:30px; }

        .treatments-container{
            background:white;
            border-radius:12px;
            padding:30px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            padding:12px;
            border-bottom:1px solid #ddd;
        }

        th{
            background:#e8f0fe;
            text-align:left;
        }

        .status-pris{
            background:#28a745;
            color:white;
            padding:5px 12px;
            border-radius:20px;
            font-size:.8rem;
        }

        .status-non-pris{
            background:#ffc107;
            color:#202124;
            padding:5px 12px;
            border-radius:20px;
            font-size:.8rem;
        }

        .status-important{
            background:#f8d7da;
            color:#dc3545;
            padding:5px 12px;
            border-radius:20px;
            font-size:.8rem;
        }
    </style>
</head>

<body>

 <!-- Sidebar -->
 <div class="sidebar">
        <div class="sidebar-header">
            <h1><i class="fas fa-stethoscope"></i> <span>SantéPlus</span></h1>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-title">Espace Médecin</div>
                <ul class="menu-items">
                    <a href="{{ route('dashboard.medecin') }}" class="menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>
                    <a href="{{ route('medecin.rendez_vous.index') }}" class="menu-item">
                        <i class="fas fa-calendar-check"></i>
                        <span>Mes Rendez-vous</span>
                    </a>
                    <a href="{{ route('medecin.traitements.index') }}" class="menu-item">
                        <i class="fas fa-pills"></i>
                        <span>Traitements patients</span>
                    </a>
                </ul>
            </div>

            <div class="menu-section">
                <div class="menu-title">Mon Compte</div>
                <ul class="menu-items">
                    <a href="{{ route('profile.edit') }}" class="menu-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Mon Profil</span>
                    </a>
                </ul>
            </div>
        </div>
    </div>

{{-- ===== MAIN ===== --}}
<div class="main-content">

    <div class="navbar">
        <h2>Suivi des traitements patients</h2>
    </div>

    <div class="content">

        <div class="treatments-container">

            @if($traitements->count())
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Médicament</th>
                        <th>Dosage</th>
                        <th>Heure</th>
                        <th>Important</th>
                        <th>État</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traitements as $t)
                    <tr>
                        <td><strong>{{ $t->patient->name }}</strong></td>

                        <td>{{ $t->nom_medicament }}</td>

                        <td>{{ $t->dosage }}</td>

                        <td>{{ $t->heure_prise }}</td>

                        <td>
                            @if($t->important)
                                <span class="status-important">Important</span>
                            @else
                                —
                            @endif
                        </td>

                        <td>
                            @if($t->pris)
                                <span class="status-pris">
                                    <i class="fas fa-check-circle"></i> Pris
                                </span>
                            @else
                                <span class="status-non-pris">
                                    <i class="fas fa-clock"></i> Non pris
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>Aucun traitement enregistré.</p>
            @endif

        </div>
    </div>
</div>

</body>
</html>
