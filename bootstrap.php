<?php
    // Carrega o autoloader do Composer
    require "vendor/autoload.php";

    // Importa as classes Bind e Connection
    use app\classes\Bind;
    use app\models\Connection;

    // Carrega as configurações do arquivo config.php
    $config = require "config.php";
    
    // Registra a configuração no Bind
    Bind::set("config", $config);
    
    // Estabelece a conexão com o banco de dados e registra no Bind
    Bind::set("connection", Connection::connect());
