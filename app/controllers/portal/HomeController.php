<?php

namespace app\controllers\portal; // Define o namespace da classe HomeController

use app\controllers\ContainerController; // Importa a classe ContainerController
use app\models\portal\User; // Importa a classe User do namespace portal

// Define a classe HomeController que estende ContainerController
class HomeController extends ContainerController
{
    // Método para exibir a página inicial
    public function index()
    {
        $user = new User; // Cria uma nova instância da classe User
        $users = $user->all(); // Obtém a lista de usuários chamando o método all() da classe User

        // Passa a lista de usuários para a visualização
        $this->view([
            "title" => "Lista de users", // Título da página
            "users" => $users // Passa a lista de usuários para o template
        ], "portal.home"); // Nome do template a ser renderizado
    }
}
