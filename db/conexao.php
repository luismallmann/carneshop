<?php
try {
    // cria o objeto de conexão PDO
    $conexao = new PDO('pgsql:host=localhost;dbname=carneshop', 
        // usuario, senha
        'postgres', 'postgres');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>






