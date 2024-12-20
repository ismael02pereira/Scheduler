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
    .title-pag {
        display: flex;
        justify-content: center;
        color: white;
        font-family: Copperplate, Papyrus, fantasy;
        font-size: 150px ;
        /* width: 300px;
        height: 200px; */
        position: relative;
        padding-bottom: 55px;
        text-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);

    }
    .main-content {
        position: relative; 
    }
    /* #calendar{ */
        /* position: absolute; Posiciona em relação ao #main-content */
            /* top: 50px; Distância do topo do container */
            /* left: 50px; Distância da borda esquerda */
            /* width: 200px; */
            /* height: 100px; */
            /* background-color: coral; */
            /* color: white; */
            /* font-size: 1.2rem; */
            /* display: flex; */
            /* align-items: center; */
            /* justify-content: center; */
            /* z-index: 10; Mantém acima de outros elementos */
            /* border: 2px solid white */
    /* } */
    .base {
            width: 100%;
            /* height: 100%; */
            /* background-color: lightgray; */
        }

        .sobreposto {
            /* position: absolute;  */
            /* top: 50px;
            left: 50px; 
            width: 200px;
            height: 100px; */
            /* background-color: coral; */
            /* color: white; */
            /* font-size: 1.2rem; */
            display: flex;
            /* align-items: center; */
            /* justify-content: center; */
            /* z-index: 10; Mantém acima de outros elementos */
            /* border: 2px solid white; */
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
                    <i class="bi bi-question-circle"></i> Ajuda
                </a>
            </li>
        </ul>
    </div>
