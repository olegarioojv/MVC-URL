<?php

return [
    // Configuração do banco de dados
    "database" => [
        "host" => "localhost", // Endereço do servidor de banco de dados
        "dbname" => "curso_mvc", // Nome do banco de dados
        "username" => "root", // Nome de usuário do banco de dados
        "password" => "", // Senha do banco de dados (vazia por padrão)
        "charset" => "utf8", // Conjunto de caracteres para o banco de dados
        "options" => [ // Opções adicionais para a conexão PDO
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configura para lançar exceções em erros
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Define o modo de fetch padrão como objeto
        ],
    ],
    // Configurações de email
    "email" => [
        // Adicione aqui as configurações de email se necessário
    ],
];
