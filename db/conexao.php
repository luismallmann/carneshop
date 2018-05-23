<?php
try {
    // cria o objeto de conexão PDO
    $conexao = new PDO('pgsql:host=localhost;dbname=carneshop', 
        // usuario, senha
        'postgres', 'postgres');
   // echo 'Conectou ao banco de dados!';
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>