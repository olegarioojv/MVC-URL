<?php

// Verifica se a função 'dd' já existe para evitar redefinições
if (!function_exists('dd')) {
    // Define a função 'dd'
    function dd($var) {
        var_dump($var); // Exibe informações sobre a variável fornecida
        die(); // Interrompe a execução do script
    }
}
