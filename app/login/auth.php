<?php
include_once('./../../conexao.php');

// Define o cabeçalho de resposta JSON
header('Content-Type: application/json');

// Obtém os dados enviados via JSON
$input = json_decode(file_get_contents('php://input'), true);

// Verifica se a classe User foi incluída corretamente
if (!class_exists('User')) {
    echo json_encode(['error' => 'Classe User não encontrada. Verifique as inclusões de arquivos.']);
    exit;
}

$user = new User();

if (isset($input['cod'])) {
    // Login com código
    $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $cod = filter_var($input['cod'], FILTER_SANITIZE_STRING);

    $response = $user->loginUser($email, $cod);
    echo json_encode(['response' => $response]);
    exit;
}

if (isset($input['email']) && isset($input['password'])) {
    // Login com email e senha
    $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $password = hash('sha256', filter_var($input['password'], FILTER_SANITIZE_STRING));

    $response = $user->loginBarber($email, $password);

    echo json_encode(['response' => $response]);
    exit;
}

// Retorno padrão para campos ausentes
echo json_encode(['error' => 'Preencha todos os campos necessários.']);
exit;
