<?php

namespace core;

use app\classes\Uri; // Importa a classe Uri para manipulação de URIs

class Parameters 
{
    private $uri; // Variável para armazenar a URI

    public function __construct()
    {
        // Inicializa a URI chamando o método da classe Uri
        $this->uri = Uri::uri();
    }

    public function load() 
    {
        // Carrega e retorna os parâmetros obtidos da URI
        return $this->getParameter();
    }

    private function getParameter()
    {
        // Verifica se a URI contém mais de dois segmentos
        if (substr_count($this->uri, "/") > 2) 
        {
            // Separa a URI em partes e filtra valores vazios
            $parameter = array_values(array_filter(explode("/", $this->uri)));

            // Retorna um objeto com o parâmetro e o próximo parâmetro, ambos sanitizados
            return (object)[
                "parameter" => filter_var($parameter[2], FILTER_SANITIZE_STRING), // Sanitiza o parâmetro
                "next" => filter_var($this->getNextParameters(2), FILTER_SANITIZE_STRING) // Sanitiza o próximo parâmetro
            ];
        }
    }

    private function getNextParameters($actual)
    {
        // Obtém os parâmetros da URI
        $parameter = array_values(array_filter(explode("/", $this->uri)));

        // Retorna o próximo parâmetro, se existir; caso contrário, retorna o atual
        return $parameter[$actual + 1] ?? $parameter[$actual];
    }
}
