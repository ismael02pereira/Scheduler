<?php 
include_once('./../../conexao.php');

if (!class_exists('User')) {
    $error = [
        'error' => 'Classe User não encontrada. Verifique as inclusões de arquivos.',
    ];
    echo json_encode($error), exit;
}
die(json_decode($_POST['email']));
$user = new User();

if (!empty($_POST["cod"])) {
    $response = $user->loginUser(
        filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        filter_var($_POST['cod'], FILTER_SANITIZE_STRING)
    );
    echo $response;
    exit;
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $response = $user->loginBarber(
        filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        hash('sha256', filter_var($_POST['password'], FILTER_SANITIZE_STRING))
    );
    echo $response;
    exit;
} else {
    $response = $user->loginBarber(
        filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        hash('sha256', filter_var($_POST['password'], FILTER_SANITIZE_STRING))
    );
    echo $response;
    exit;
    // $error = [
    //     'error'=>"Preencha todos os campos necessários."
    // ];

    // echo json_encode($error), exit;
}
?>
