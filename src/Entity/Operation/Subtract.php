<?php

namespace App\Entity\Operation;

use App\Entity\Operation\OperationInterface;

class Subtract implements OperationInterface
{
    public function runCalculation($firstNumber, $secondNumber)
    {
        return $firstNumber - $secondNumber;
    }
}