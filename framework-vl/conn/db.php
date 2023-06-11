<?php
    $host = 'localhost';
    $dbName = 'news_blog';
    $user = 'root';
    $password = '';

    try {
        // Criação da instância PDO para conexão com o banco de dados
        $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Tratamento de erros na conexão com o banco de dados
        die('Erro na conexão com o banco de dados: ' . $e->getMessage());
    }
    return $db;
