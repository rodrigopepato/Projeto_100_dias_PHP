# O que é Herança?

Herança é um dos pilares da **Programação Orientada a Objetos (POO)** em PHP. Ela permite que uma classe (filha) herde atributos e métodos de outra classe (pai), promovendo **reutilização de código** e **extensibilidade**.

---

## Como Funciona?

A herança é implementada usando a palavra-chave `extends`. A classe filha pode:
- Utilizar métodos e atributos da classe pai.
- Sobrescrever métodos para alterar ou estender seu comportamento.

---

## Exemplo de Herança

```php
<?php

// Classe Pai
class Animal
{
    public $nome;

    public function emitirSom()
    {
        echo "O animal emite um som.";
    }
}

// Classe Filha
class Cachorro extends Animal
{
    public function emitirSom()
    {
        echo "O cachorro late.";
    }
}

// Criando um objeto da classe filha
$cachorro = new Cachorro();
$cachorro->nome = "Rex";
$cachorro->emitirSom(); // Saída: O cachorro late.
```

---

## Benefícios

- **Reutilização de código**: Evita duplicação de lógica comum.
- **Facilidade de manutenção**: Atualizações no código pai refletem automaticamente nas classes filhas.
