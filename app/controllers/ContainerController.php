<?php

namespace app\controllers; // Define o namespace da classe ContainerController

use app\traits\View; // Importa o trait View

// Define uma classe abstrata chamada ContainerController
abstract class ContainerController
{
    use View; // Utiliza o trait View, permitindo o uso de suas funções dentro da classe
}
