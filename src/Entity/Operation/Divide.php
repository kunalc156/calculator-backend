<?php

namespace App\Entity\Operation;

use App\Entity\Operation\OperationInterface;

class Divide implements OperationInterface
{
    public function runCalculation($firstNumber, $secondNumber)
    {
        if($secondNumber == 0)
            throw new \Exception('Division by zero issue');
        return $firstNumber / $secondNumber;
    }
}