<?php
mysqli_report(MYSQLI_REPORT_ERROR);

$conn = new mysqli('localhost', 'root', '', 'teste');

/*try {
    $conexao = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:".$erro->getMessage();
}*/