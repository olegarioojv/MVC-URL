<?php

namespace core;

use Twig\Environment; // Importa a classe Environment do Twig
use Twig\Extension\StringLoaderExtension; // Importa a extensão StringLoader do Twig

class Twig 
{
    private $twig; // Variável para armazenar a instância do Twig
    private $functions = []; // Array para armazenar funções personalizadas do Twig

    // Método para carregar o Twig e suas configurações
    public function loadTwig()
    {
        // Inicializa o ambiente Twig com as configurações
        $this->twig = new Environment($this->loadViews(), [
            "debug" => true,           // Habilita o modo debug para facilitar a depuração
            "auto_reload" => true,     // Habilita recarregar templates quando eles são modificados
        ]);

        // Retorna a instância do Twig
        return $this->twig;
    }

    // Carrega o diretório de templates/views
    private function loadViews()
    {
        return new \Twig\Loader\FilesystemLoader("../app/views"); // Define o caminho para as views
    }

    // Método para carregar extensões adicionais do Twig
    public function loadExtensions()
    {
        $this->twig->addExtension(new StringLoaderExtension()); // Adiciona a extensão StringLoader
    }

    // Método para criar funções personalizadas para as views do Twig
    private function functionsToView($name, \Closure $callback)
    {
        return new \Twig\TwigFunction($name, $callback); // Cria uma nova função Twig
    }

    // Carrega funções personalizadas definidas em um arquivo
    public function LoadFunctions(): void
    { 
        require "../app/functions/twig.php"; // Inclui o arquivo com as funções

        // Adiciona cada função personalizada ao ambiente Twig
        foreach ($this->functions as $key => $value)
        {
            $this->twig->addFunction($this->functions[$key]); // Adiciona a função ao Twig
        }
    } 
}
