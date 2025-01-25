## Scope Resolution Operator (`::`)

O **Scope Resolution Operator (`::`)** em PHP é usado para acessar membros estáticos, constantes, e sobrescrever métodos ou propriedades de classes pais. Ele também é conhecido como **Paamayim Nekudotayim** (em hebraico, significa "duas vezes dois pontos").

### Principais Usos

#### 1. **Acessar Membros Estáticos**
Permite acessar propriedades ou métodos estáticos de uma classe.

```php
class Exemplo {
    public static $valor = "Olá, Mundo!";
    public static function exibirValor() {
        return self::$valor;
    }
}

// Acesso ao membro estático
echo Exemplo::$valor; // Saída: Olá, Mundo!
echo Exemplo::exibirValor(); // Saída: Olá, Mundo!
```

#### 2. **Acessar Constantes**
Pode ser usado para acessar constantes de uma classe.

```php
class Constantes {
    const PI = 3.14;
}

// Acesso à constante
echo Constantes::PI; // Saída: 3.14
```

#### 3. **Acessar Métodos ou Propriedades da Classe Pai**
Em cenários de herança, o operador é usado para invocar métodos ou propriedades da classe pai.

```php
class Pai {
    public static function mensagem() {
        return "Mensagem do Pai";
    }
}

class Filho extends Pai {
    public static function mensagem() {
        return parent::mensagem() . " e do Filho.";
    }
}

echo Filho::mensagem(); // Saída: Mensagem do Pai e do Filho.
```

#### 4. **Acessar o Operador Dinâmico**
Pode ser usado com nomes de classes definidos dinamicamente.

```php
class Dinamico {
    public static function teste() {
        return "Método chamado dinamicamente!";
    }
}

$classe = "Dinamico";
echo $classe::teste(); // Saída: Método chamado dinamicamente!
```

---

### Diferenças entre `self::`, `parent::` e `static::`

| Operador   | Descrição                                                                 |
|------------|---------------------------------------------------------------------------|
| `self::`   | Refere-se à classe onde o código está sendo executado (ligação estática). |
| `parent::` | Refere-se à classe pai na hierarquia de herança.                          |
| `static::` | Usa ligação tardia para determinar a classe em tempo de execução.         |

---

### Observações
- Não pode ser usado para acessar métodos ou propriedades **não estáticos**.
- É especialmente útil em **POO**, onde facilita a manipulação de elementos da classe sem instanciar objetos.

Com o operador `::`, o PHP oferece flexibilidade para lidar com elementos estáticos e de classe, promovendo uma abordagem mais estruturada no desenvolvimento.
