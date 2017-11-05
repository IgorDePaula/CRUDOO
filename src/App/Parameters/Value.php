<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:33
 */

namespace App\Parameters;


class Value implements Parameters
{
    protected $value = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpret()
    {
        return $this->value;
    }


}
