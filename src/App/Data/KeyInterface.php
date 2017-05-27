<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/05/17
 * Time: 13:42
 */

namespace App\Data;


interface KeyInterface extends ValueInterface
{
    public function setData($data);

    public function setKey(array $key);

    public function getKey();
}