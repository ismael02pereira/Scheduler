<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduler</title>
    <!-- Link para o CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para o ícone do Bootstrap (opcional, para ícones no menu lateral) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/theme.css">

    <style>
        /* Customização do menu lateral */
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color:rgb(255, 255, 255);
            border-radius: 50px 0px 0px 50px; 
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .sidebar {
        width: 250px;
        background-color: #343a40;
        color: white;
        padding-top: 20px;
        position: fixed; /* Fixa o menu lateral */
        top: 0; /* Alinha no topo */
        bottom: 0; /* Estende até o final da janela */
        left: 0; /* Mantém à esquerda */
        overflow-y: auto; /* Adiciona barra de rolagem se o conteúdo for maior que a tela */
    }
    .main-content {
        margin-left: 250px; /* Ajusta o conteúdo principal para não sobrepor o menu */
        padding: 20px;
    }

    </style>
</head>
<body>

    <!-- Menu Lateral -->
    <div class="sidebar">
        <h4 class="text-center text-white">Scheduler</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="http://localhost/Scheduler/app/dashboard.php">
                    <i class="bi bi-house-door"></i> Início
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Scheduler/app/agendamento.php">
                    <i class="bi bi-person"></i> Agendamento
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-gear"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-envelope"></i> Mensagens
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-question-circle"></i> Ajuda
                </a>
            </li>
        </ul>
    </div>
