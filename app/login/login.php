<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Horários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="loginContainer" class="mb-4">
            <h2>Login</h2>
            <div class="mb-3">
                <label for="userType" class="form-label">Tipo de Usuário:</label>
                <select id="userType" class="form-select">
                    <option value="profissional">Profissional</option>
                    <option value="cliente">Cliente</option>
                </select>
            </div>
            <form id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3" id="passwordGroup">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="mb-3 d-none" id="codGroup">
                    <label for="cod" class="form-label">Código:</label>
                    <input type="text" class="form-control" id="cod">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
