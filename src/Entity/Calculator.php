<?php

namespace App\Entity;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Entity\Operation\Add;
use App\Entity\Operation\Subtract;
use App\Entity\Operation\Divide;
use App\Entity\Operation\Multiply;

class Calculator
{
    public static function calculate($expression) {
        
        $operator = null;
        if(!self::validateExpression($expression) || empty($expression)) 
            throw new \Exception('Invalid Expression');

        $arr = self::splitExpression($expression);
        $stack = [];
        $operatorStack = [];
        for( $i = 0; $i < count($arr); $i++) {
            if(is_numeric($arr[$i])) {
                if( count($stack) == 1)
                {
                    $elem = array_pop($stack);
                    switch( $operator ) {
                        case '*':
                            $op = new Multiply();
                            $res = $op->runCalculation($elem, $arr[$i]);
                            array_push($stack, $res);
                            array_pop($operatorStack);
                            break;
                        case '+': 
                            $op = new Add();
                            array_push($stack, $op->runCalculation($elem, $arr[$i]));
                            array_pop($operatorStack);
                            break; 
                        case '/': 
                            $op = new Divide();
                            array_push($stack, $op->runCalculation($elem, $arr[$i]));
                            array_pop($operatorStack);
                            break;
                        case '-': 
                            $op = new Subtract();
                            array_push($stack, $op->runCalculation($elem, $arr[$i]));
                            array_pop($operatorStack);
                            break;                           
                    }
                } 
                else {
                    array_push($stack, $arr[$i]);
                }
            } else {
                $operator = $arr[$i];
                array_push($operatorStack, $operator);
                if(count($operatorStack) > 1) 
                    throw new \Exception('Invalid Expression');
            }

        }
        $elem = array_pop($stack);

        return $elem; 
    }

    public static function splitExpression($string) {
        //$result = str_split (string);
        $pttn='+-/*';   # standard mathematical operators
        $pttn=sprintf( '@([%s])@', preg_quote( $pttn ) ); # an escaped/quoted pattern
        $out=preg_split( $pttn, preg_replace( '@\s@', '', $string ), -1, PREG_SPLIT_DELIM_CAPTURE );

        return $out;
    }

    public static function validateExpression($string) {

        if(!preg_match('~^[0-9()+\-*\/]+$~', preg_replace( '@\s@', '', $string ))){
            return false;
        } 
        return true;
    }
}
