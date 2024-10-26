<?php

namespace app\models\portal; // Define o namespace da classe User

use app\models\Model; // Importa a classe Model

class User extends Model 
{
    protected $table = 'users'; // Nome da tabela no banco de dados

    // Método para obter todos os usuários
    public function getAllUsers() {
        return $this->all(); // Chama o método all() da classe pai (Model)
    }
}
