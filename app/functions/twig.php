<?php

// Adiciona uma função personalizada chamada "user" ao array de funções
$this->functions[] = $this->functionsToView("user", function() {
    return "dados user"; // Retorna a string "dados user" quando a função é chamada
});

// Adiciona outra função personalizada chamada "teste" ao array de funções
$this->functions[] = $this->functionsToView("teste", function() {
    return "teste"; // Retorna a string "teste" quando a função é chamada
});
