<?php

namespace core;

use app\classes\Uri; // Importa a classe Uri para manipulação de URIs
use app\exceptions\MethodNotExistException; // Importa a exceção personalizada

class Method 
{
    private $uri; // Variável para armazenar a URI

    // Construtor que inicializa a URI
    public function __construct() 
    {
        $this->uri = Uri::uri(); // Obtém a URI atual
    }

    // Função que carrega e verifica se o método existe no controlador
    public function load($controller)
    {
        // Obtém o método a partir da URI
        $method = $this->getMethod();

        // Verifica se o método existe no controlador
        if (!method_exists($controller, $method)) 
        {
            // Lança uma exceção personalizada se o método não existir
            throw new MethodNotExistException("Esse método não existe: {$method}");
        }

        return $method; // Retorna o nome do método
    }

    // Função privada para obter o método da URI
    private function getMethod()
    {
        // Se a URI tem mais de uma barra, separa o controlador e o método
        if (substr_count($this->uri, "/") > 1) 
        {
            list($controller, $method) = array_values(array_filter(explode("/", $this->uri)));
            return $method; // Retorna o método extraído da URI
        }

        // Se não houver método especificado, retorna o método padrão 'index'
        return "index";
    }
}
