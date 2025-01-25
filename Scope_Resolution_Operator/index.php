<?php $title = 'Scope Resolution Operator' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <div>
        <h2>Constantes</h2>
        <?php
        class MyExampleWithContants
        {
            public const MY_CONSTANT = 'Example with constants';
        }

        ?>
        <br><br>

        <?=MyExampleWithContants::MY_CONSTANT; ?>

    </div>

    <div style="margin-top: 50px;">
        <h2>Self</h2>
        <?php
        class MyExampleWithSelf
        {
            protected const MESSAGE = 'We are on the \'self\' example';

            public function showMessage(): string
            {
                return self::MESSAGE;
            }
        }

        ?>
        <br><br>

        <?= (new myExampleWithSelf())->showMessage() ?>

    </div>

    <div style="margin-top: 50px;">
        <h2>Static</h2>
        <?php
        class MySuperStaticComponent
        {
            public static function who(): string
            {
                return __CLASS__;
            }

            public static function greetings(): string
            {
                return 'Hello from ' . static::who();
            }
        }

        class MyStaticComponent extends MySuperStaticComponent
        {
            public static function who(): string
            {
                return __CLASS__;
            }
        }

        ?>
        <br><br>
        <?= MySuperStaticComponent::greetings() ?>
        <br><br>
        <?= MyStaticComponent::greetings() ?>

    </div>

    <div style="margin-top: 50px;">
        <h2>Parent</h2>
        <?php
        class Vehicle
        {
            protected bool $started = false;

            public function startEngine(): void
            {
                $this->started = true;
            }
        }

        class Car extends Vehicle
        {
            protected bool $isOnNeutral = false;

            public function startEngine(): void
            {
                $this->isOnNeutral = true;

                parent::startEngine();
            }
        }

        $car = new Car();
        var_dump($car);
        echo '<br>';
        $car->startEngine();
        var_dump($car);
        ?>
    </div>

</body>
</html>
