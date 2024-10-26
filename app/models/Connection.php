<?php

namespace app\models; // Define o namespace da classe Connection

use app\classes\Bind; // Importa a classe Bind
use PDO; // Importa a classe PDO para acesso a banco de dados
use PDOException; // Importa a exceção PDOException para tratamento de erros

class Connection
{
    // Método estático para estabelecer uma conexão com o banco de dados
    public static function connect()
    {
        // Obtém a configuração do banco de dados usando a classe Bind
        $config = (object)Bind::get("config")->database;

        try {
            // Cria uma nova instância PDO com as configurações do banco de dados
            $pdo = new PDO("mysql:host={$config->host};dbname={$config->dbname};charset={$config->charset}", $config->username, $config->password, $config->options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro como exceção
            return $pdo; // Retorna a instância do PDO
        } catch (PDOException $e) {
            // Exibe a mensagem de erro caso a conexão falhe
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage(); // Exibe a mensagem de erro
            return null; // Retorna nulo em caso de erro
        }
    }
}
