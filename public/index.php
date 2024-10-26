<?php

// Inclui o arquivo de bootstrap que configura a aplicação
require "../bootstrap.php";

// Importa as classes Controller, Method e Parameters
use core\Controller;
use core\Method;
use core\Parameters;

// Exemplo de URL que pode ser usada: https://devclass.com.br/curso/show/12

try {
    // Cria uma nova instância do Controller
    $controller = new Controller;
    // Carrega o controller
    $controller = $controller->load();
  
    // Cria uma nova instância do Method
    $method = new Method;
    // Carrega o método do controller
    $method = $method->load($controller);

    // Cria uma nova instância de Parameters
    $parameters = new Parameters();
    // Carrega os parâmetros
    $parameters = $parameters->load();

    // Chama o método do controller passando os parâmetros
    $controller->$method($parameters);

} catch (\Exception $e) {
    // Em caso de erro, imprime a mensagem da exceção
    dd($e->getMessage());
}

// Comentários sobre o código adicional (não executado):
// $parameters = new Parameters;
// $parameters->$parameters->getParameters();
// $controller->$method($parameters);
