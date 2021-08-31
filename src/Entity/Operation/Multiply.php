<?php

namespace App\Entity\Operation;

use App\Entity\Operation\OperationInterface;

class Multiply implements OperationInterface
{
    public  function runCalculation($firstNumber, $secondNumber)
    {
        return $firstNumber * $secondNumber;
    }
}