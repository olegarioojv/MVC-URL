<?php

namespace app\models; // Define o namespace da classe Model

use app\classes\Bind; // Importa a classe Bind para acessar a conexão
use PDOException; // Importa a exceção PDOException para tratamento de erros
use PDO; // Importa a classe PDO para operações de banco de dados

abstract class Model 
{
    protected $connection; // Variável para armazenar a conexão com o banco de dados
    protected $table; // Nome da tabela a ser usada no modelo

    // Construtor que inicializa a conexão com o banco de dados
    public function __construct()
    {
        $this->connection = Bind::get("connection"); // Obtém a conexão usando a classe Bind
    }

    // Método para recuperar todos os registros da tabela
    public function all()
    {
        try {
            $sql = "SELECT * FROM {$this->table}"; // Monta a query para selecionar todos os registros
            $list = $this->connection->query($sql); // Executa a query
            $list->execute(); // Executa a instrução
            return $list->fetchAll(PDO::FETCH_ASSOC); // Retorna os resultados como um array associativo
        } catch (PDOException $e) {
            // Captura e exibe qualquer erro ao recuperar os dados
            echo "Erro ao recuperar dados: " . $e->getMessage(); // Exibe mensagem de erro
            return []; // Retorna um array vazio em caso de erro
        }
    }
}
