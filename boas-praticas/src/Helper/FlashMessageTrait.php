<?php

namespace Alura\Mvc\Helper;

trait FlashMessageTrait
{
    private function addErrorMessage( string $errorMessage): void
    {
        $_SESSION['error_message'] = $errorMessage;
    }
}
