<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:39
 */

namespace App\Parameters;


class Equals implements Parameters
{
    protected $field;
    protected $value;

    public function __construct(Parameters $field, Parameters $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
    public function interpret()
    {
        return "{$this->field->interpret()} = {$this->value->interpret()}";
    }

}
