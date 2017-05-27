<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/05/17
 * Time: 19:02
 */

namespace AppTest;


use App\Data\ValueInterface;

class BridgeData implements ValueInterface
{

    private $data = [];
    private $index = '';
    private $key = [];
    private $value = '';

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        count($this->key) > 0 ? $this->data = array_values($data) : $this->data = $data;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setKey(array $key)
    {
        $this->key = array_keys($key);
        return $this;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }
}