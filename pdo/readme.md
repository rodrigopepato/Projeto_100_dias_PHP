# **PDO (PHP Data Objects)**

PDO é uma extensão do PHP que fornece uma interface leve e consistente para acessar diferentes bancos de dados. É amplamente utilizado para gerenciar conexões e realizar operações em bancos de dados de forma segura e eficiente.

## **Principais características**
- **Abstração de banco de dados:**
  PDO permite trabalhar com diferentes bancos (MySQL, PostgreSQL, SQLite, etc.) sem alterar significativamente o código, apenas mudando o driver.

- **Segurança:**
  Suporte integrado para *prepared statements* e *bind parameters*, reduzindo o risco de ataques SQL Injection.

- **Flexibilidade:**
  Disponibiliza métodos para execução de consultas SQL, obtenção de resultados (*fetch*) e manipulação de transações.

- **Erro e exceções:**
  PDO utiliza exceções para tratamento de erros, facilitando o gerenciamento de problemas no código.

## **Exemplo de uso básico**
```php
<?php
try {
    // Conexão com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=teste', 'usuario', 'senha');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query com prepared statement
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
    $stmt->execute(['id' => 1]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($usuario);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
```

## **Vantagens**
- Portabilidade entre bancos de dados.
- Mais segurança ao trabalhar com dados do usuário.
- API simples e unificada para diferentes bancos.
