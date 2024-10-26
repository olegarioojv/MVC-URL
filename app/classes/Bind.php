<?php

namespace app\classes; // Define o namespace da classe Bind

// Define a classe Bind, responsável por armazenar e recuperar valores
class Bind
{
    private static $bind = []; // Array estático para armazenar os valores associados a nomes

    // Método estático para definir um valor associado a um nome
    public static function set($name, $value)
    {
        // Verifica se o nome já está definido no array $bind
        if (!isset(static::$bind[$name])) 
        {
            static::$bind[$name] = $value; // Define o valor se o nome não existir
        }
    }

    // Método estático para recuperar um valor associado a um nome
    public static function get($name) 
    {
        // Verifica se o nome existe no array $bind
        if (!isset(static::$bind[$name]))
        {
            // Lança uma exceção se o índice não existir
            throw new \Exception("Esse índice não existe dentro do bind: {$name}");
        }

        // Retorna o valor como um objeto
        return (object)static::$bind[$name];
    }
}
