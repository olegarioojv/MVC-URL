<?php

namespace app\traits;

use core\Twig; // Importa a classe Twig do namespace core

trait View  
{
    // Método privado para inicializar e configurar o Twig
    private function twig() 
    {
        $twig = new Twig; // Cria uma nova instância da classe Twig
        $loadTwig = $twig->loadTwig(); // Carrega o Twig e suas configurações

        $twig->loadExtensions(); // Carrega extensões adicionais do Twig
        
        $twig->LoadFunctions(); // Carrega funções personalizadas para o Twig

        return $loadTwig; // Retorna a instância do Twig
    }

    // Método público para renderizar uma view com os dados fornecidos
    public function view($data, $view)
    {
        // Converte o nome da view de "dot notation" para um caminho de arquivo e carrega o template
        $template = $this->twig()->load(str_replace(".", "/", $view) . ".html");

        // Renderiza e exibe o template com os dados fornecidos
        return $template->display($data);
    }
}
