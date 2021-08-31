<?php
namespace App\Tests\Entity;

use App\Entity\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
   

    public function testExpression()
    {
         //expression -> expected result
        $expresssionArr = [
            "1+2+++++333+3" => false,
            "1+2+3+4" => 10,
            "1/0+3*4" => false,
            "4*5+4/6-4" => 0,
            "4    -   5   +  132" => 131
        ];
        foreach($expresssionArr as $key => $value){
            $result =  Calculator::calculate($key);
            // assert that your calculator added the numbers correctly!
           if(strpos($result, '500 Internal Server Error') !== false)  $result = false;
            $this->assertEquals($value, $result);
        }
    }
} 