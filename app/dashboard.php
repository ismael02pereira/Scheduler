<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    // Inclui o arquivo header.php
    include('./header.php');
    
?>

<!-- Conteúdo principal da página -->
<div class="main-content">
<!-- Dashboard -->
<div id="dashboard" style="display: none;">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total de Clientes</h5>
                    <p class="card-text" id="totalClients">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cortes de Cabelo</h5>
                    <p class="card-text" id="totalHaircuts">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Barbas</h5>
                    <p class="card-text" id="totalBeards">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Outros</h5>
                    <p class="card-text" id="others">0</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // Inclui o arquivo footer.php
    include('footer.php');
?>
