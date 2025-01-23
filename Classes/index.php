<!DOCTYPE html>
<html lang="en">
<?php $title = 'Classes - O básico'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>

    <?php
    class Pessoa
    {
        public ?string $nacionalidade = null;

        public function __construct(
            protected string $nome,
            protected int $idade,
            protected string $corDoCabelo
        ) {
            $this->setCorDoCabelo($corDoCabelo);
        }

        public function andar(): string
        {
            return $this->nome . ' está andando...';
        }

        public function falar(): string
        {
            return $this->nome . ' está falando...';
        }

        public function nome(): string
        {
            return $this->nome;
        }

        public function idade(): int
        {
            return $this->idade;
        }

        public function corDoCabelo(): string
        {
            return $this->corDoCabelo;
        }

        public function setNome(string $nome): self
        {
            $this->nome = $nome;

            return $this;
        }

        public function setIdade(int $idade): self
        {
            $this->idade = $idade;

            return $this;
        }

        public function setCorDoCabelo(string $corDoCabelo): self
        {
            if (!in_array($corDoCabelo, ['preto', 'castanho', 'loiro', 'ruivo'])) {
                throw new \InvalidArgumentException('Cor do cabelo inválida');
            }
            $this->corDoCabelo = $corDoCabelo;

            return $this;
        }

    }

    $pessoa = new Pessoa(
        nome: 'Joe Doe',
        idade: 25,
        corDoCabelo: 'loiro'
    );

    var_dump($pessoa);

    $pessoa->nacionalidade = 'italiano';

    $pessoa->setNome('Rodrigo')
            ->setIdade(24)
            ->setCorDoCabelo('castanho');

    var_dump($pessoa);

    ?>
</body>
</html>
