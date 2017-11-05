<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:38
 */

namespace App\Parameters;


class ORParameter implements Parameters
{
    private $sideA, $sideB;

    public function __construct(Parameters $sideA,Parameters $sideB)
    {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
    }

    public function interpret()
    {
        return "{$this->sideA->interpret()} OR {$this->sideB->interpret()}";
    }

}
// 2 ou 3
