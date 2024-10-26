<?php

namespace core;

use app\classes\Uri; // Importa a classe Uri
use app\exceptions\ControllerNotExistException; // Importa a exceção personalizada

class Controller 
{
    private $uri; // Variável para armazenar a URI atual
    private $controller; // Nome do controller a ser instanciado
    private $namespace; // Namespace do controller
    private $folders = [ // Pastas onde os controllers estão localizados
        "app\controllers\portal",  
        "app\controllers\admin"
    ];

    public function __construct()
    {
        // Obtém a URI atual usando a classe Uri
        $this->uri = Uri::uri();
    }

    public function load()
    {
        // Verifica se a URI corresponde à página inicial
        if ($this->isHome()) {
            return $this->controllerHome();
        }

        // Se não for a página inicial, chama o método correspondente
        return $this->controllerNotHome();
    }

    private function controllerHome()
    {
        // Verifica se o HomeController existe
        if (!$this->controllerExist("HomeController")) {
            throw new ControllerNotExistException("Esse controller não existe");
        }
        
        // Instancia o controller
        return $this->instantiateController();
    }

    private function controllerNotHome()
    {
        // Obtém o controller que não é a página inicial
        $controller = $this->getControllerNotHome();

        // Verifica se o controller existe
        if (!$this->controllerExist($controller)) {
            throw new ControllerNotExistException("Esse controller não existe");
        }

        // Instancia o controller
        return $this->instantiateController();
    }

    private function getControllerNotHome() 
    {
        // Se a URI contém mais de um segmento
        if (substr_count($this->uri, "/") > 1) {
            // Separa a URI e obtém o nome do controller
            list($controller, $method) = array_values(array_filter(explode("/", $this->uri)));
            return ucfirst($controller) . "Controller"; // Retorna o nome do controller com a primeira letra maiúscula
        }

        // Para uma URI simples, retorna o controller correspondente
        return ucfirst(ltrim($this->uri, "/")) . "Controller";
    }

    private function isHome()
    {
        // Verifica se a URI é a raiz (home)
        return $this->uri === "/";
    }

    private function controllerExist($controller)
    {
        // Verifica se o controller existe em uma das pastas
        foreach ($this->folders as $folder) { 
            if (class_exists($folder . "\\" . $controller)) {
                $this->namespace = $folder; // Armazena o namespace
                $this->controller = $controller; // Armazena o nome do controller
                return true; // Controller existe
            }
        }

        return false; // Controller não existe
    }

    private function instantiateController()
    {
        // Cria uma nova instância do controller
        $controller = $this->namespace . "\\" . $this->controller;
        return new $controller();
    }
}
