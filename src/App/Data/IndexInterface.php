<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/05/17
 * Time: 13:42
 */

namespace App\Data;


interface IndexInterface extends ValueInterface
{
    public function setIndex($index);

    public function setValue($value);

    public function getIndex();
}