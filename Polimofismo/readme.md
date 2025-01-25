### Polimorfismo em PHP

O **polimorfismo** em PHP permite que métodos com o mesmo nome tenham comportamentos diferentes em classes distintas, desde que essas classes implementem a mesma interface ou herdem de uma classe base.

#### Exemplo com Herança:
```php
class Animal {
    public function emitirSom() {
        return "Som genérico";
    }
}

class Cachorro extends Animal {
    public function emitirSom() {
        return "Latido";
    }
}

class Gato extends Animal {
    public function emitirSom() {
        return "Miau";
    }
}

// Uso polimórfico
$animais = [new Cachorro(), new Gato()];
foreach ($animais as $animal) {
    echo $animal->emitirSom() . PHP_EOL;
}
```

#### Exemplo com Interface:
```php
interface Forma {
    public function calcularArea();
}

class Circulo implements Forma {
    public function calcularArea() {
        return "Área do círculo";
    }
}

class Retangulo implements Forma {
    public function calcularArea() {
        return "Área do retângulo";
    }
}
```
