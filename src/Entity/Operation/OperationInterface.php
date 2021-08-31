<?php

namespace App\Entity\Operation;

interface OperationInterface
{
    public function runCalculation($firstNumber, $secondNumber);
}