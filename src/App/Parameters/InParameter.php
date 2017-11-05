<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 05/11/17
 * Time: 09:49
 */

namespace App\Parameters;


class InParameter implements Parameters
{
    protected  $field;
    protected $array;
    public function __construct(Parameters $field, array $array)
    {
        $this->field = $field;
        $this->array = '('.implode(', ', $array).')';
    }

    public function interpret()
    {
        return "{$this->field->interpret()} IN {$this->array}";
    }

}
