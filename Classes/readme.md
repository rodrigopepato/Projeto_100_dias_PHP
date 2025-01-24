# O que são Classes?

Classes em PHP são moldes para criar objetos, permitindo organizar código com **atributos** (dados) e **métodos** (funções).

## Estrutura Básica

```php
<?php

class MinhaClasse
{
    public $atributo; // Propriedade

    public function metodo() // Método
    {
        echo "Olá, sou um método!";
    }
}
```

## Criando Objetos

```php
<?php

$objeto = new MinhaClasse();
$objeto->atributo = "Valor";
$objeto->metodo();
```
