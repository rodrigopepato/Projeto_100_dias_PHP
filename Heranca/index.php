<?php $title = 'OPP - herança'; ?>
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
    class Veiculo
    {
        protected string $tracao = 'animal';

        protected bool $hasMotor;

        protected bool $emMovimento = false;

        private ?string $tipoCombustivel = null;

        public function __construct()
        {
            $this->hasMotor = $this->tracao === 'automotor';
        }

        public function movimentar(string $combustivel): self
        {
            $this->setCombustivel($combustivel);

            $this->emMovimento = true;

            return $this;
        }

        public function parar(): self
        {
            $this->emMovimento = false;

            return $this;
        }

        public function emMovimento(): bool
        {
            return $this->emMovimento;
        }

        private function setCombustivel(string $combustivel): void
        {
            $this->tipoCombustivel = $combustivel;
        }
    }

    class Carro extends Veiculo
    {
        protected string $tracao = 'automotor';

        protected bool $rodasAlinhadas = false;

        public function movimentar(string $combustivel): self
        {
            $this->rodasAlinhadas = true;

            parent::movimentar($combustivel);

            return $this;
        }
    }

    class Skate extends Veiculo
    {
    }

    $veiculo = new Veiculo();
    var_dump($veiculo);

    echo '<br><br>';

    $carro = new Carro();
    var_dump($carro);

    echo '<br><br>';

    $skate = new Skate();
    var_dump($skate);

    ?>

    <div style="margin-top: 50px;">
        <h2>Acessando Atributos e Métodos públicos</h2>
        <?php
        // Chamando atributos públicos
        $carro->movimentar('gasolina');
        var_dump($carro);
        ?>
    </div>

    <div style="margin-top: 50px;">
        <h2>Métodos privados</h2>
        <?php
        $carro2 = new Carro();
        $carro2->movimentar('alcool');
        var_dump($carro2);
        ?>
    </div>
</body>
</html>
