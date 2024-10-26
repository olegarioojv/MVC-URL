<?php

namespace app\controllers\portal; // Define o namespace da classe CursoController

use app\controllers\ContainerController; // Importa a classe ContainerController

// Define a classe CursoController que estende ContainerController
class CursoController extends ContainerController
{
    // Método para exibir a lista de cursos (ainda não implementado)
    public function index()
    {

    }

    // Método para exibir detalhes de um curso específico
    public function show($request)
    {
        // Chama a função de view, passando dados para o template
        $this->view([
            "tittle" => "Curso", // Título da página
            "curso" => "PHP MVC" // Nome do curso
        ], "portal.curso"); // Nome do template a ser renderizado
    } 
    
    // Método para mostrar o formulário de criação de um novo curso (ainda não implementado)
    public function create()
    {

    }
    
    // Método para armazenar um novo curso (ainda não implementado)
    public function store()
    {

    }

    // Método para editar um curso existente (ainda não implementado)
    public function edit($id)
    {

    }
}
