<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07/05/17
 * Time: 14:17
 */

namespace App;


use App\Data\KeyInterface;
use App\Data\ValueInterface;
use InvalidArgumentException;

class Insert extends AbstractSql
{
    private $keys = [];

    private $values = [];

    public function __construct()
    {
        $this->sql = 'INSERT INTO %s (%s) VALUES (%s)';
    }

    public function setData(ValueInterface $data)
    {
        if (!in_array(KeyInterface::class, class_implements($data))) {
            throw new InvalidArgumentException('The argument provided must be IndexInterface type.');
        }
        $this->setKeys($data->getkey());
        $this->setValues($data->getData());
    }

    public function process()
    {
        $sql = $this->sql;
        $this->sql = sprintf($sql, $this->getTable(), $this->getKeys(), $this->getValues());
    }

    /**
     * Retorna os campos a serem preenchidos
     * @return array
     */
    protected function getKeys()
    {
        return implode(', ', $this->keys);
    }

    /**
     * @param array $keys Campos a serem preenchidos
     * @return Insert
     */
    protected function setKeys(array $keys)
    {
        $this->keys = $keys;
        return $this;
    }

    /**
     * Retorna os valores a serem inseridos
     * @return array
     */
    protected function getValues()
    {
        return implode(', ', $this->values);
    }

    /**
     * @param array $values Valores a serem inseridos
     * @return Insert
     */
    protected function setValues(array $values)
    {
        $this->values = $values;
        return $this;
    }
}