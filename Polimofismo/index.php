<?php $title = 'Polimofismo' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>

    <?php
    abstract class Animal
    {
        protected bool  $isMoving = false;

        public function mover(): self
        {
            $this->isMoving = true;

            return $this;
        }

        public abstract function emitirSom(): string;

    }

    class Humano extends Animal
    {
        public function emitirSom(): string
        {
            return 'bla bla bla';
        }
    }

    class Passaro extends Animal
    {
        protected bool $estaVoando;

        public function voar(): self
        {
            $this->estaVoando = true;

            parent::mover();

            return $this;
        }

        public function emitirSom(): string
        {
            return 'piu piu';
        }
    }

    ?>

    <div style="margin-top: 50px;">
        <h2>Humano</h2>
        <?php
        $rodrigo = new Humano();
        $rodrigo->mover();

        echo $rodrigo->emitirSom();

        echo '<br><br>';

        var_dump($rodrigo);
        ?>
    </div>

    <div style="margin-top: 50px;">
        <h2>Passaro</h2>
        <?php
        $passaro = new Passaro();
        $passaro->voar();

        echo $passaro->emitirSom();

        echo '<br><br>';

        var_dump($passaro);
        ?>
    </div>
</body>
</html>
