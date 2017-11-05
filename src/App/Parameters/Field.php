<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:33
 */

namespace App\Parameters;


class Field implements Parameters
{
    protected $field = null;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function interpret()
    {
        return $this->field;
    }
}
