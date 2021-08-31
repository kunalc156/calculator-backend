<?php

namespace App\Entity\Operation;

use App\Entity\Operation\OperationInterface;

class Add implements OperationInterface
{
    public function runCalculation($firstNumber, $secondNumber)
    {
        return $firstNumber + $secondNumber;
    }
}