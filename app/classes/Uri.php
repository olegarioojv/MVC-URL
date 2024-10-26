<?php

namespace app\classes; // Define o namespace da classe Uri

// Define a classe Uri, responsável por manipular a URI da requisição
class Uri
{
    // Método estático que retorna a URI da requisição
    public static function uri()
    {
        // Obtém a URI da requisição atual
        $uri = $_SERVER['REQUEST_URI'];

        // Retorna apenas o caminho da URI
        return parse_url($uri, PHP_URL_PATH);
    }
}


