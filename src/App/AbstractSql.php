<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07/05/17
 * Time: 14:04
 */

namespace App;


use App\Data\ValueInterface;

abstract class AbstractSql
{
    protected $sql = '';

    private $table = '';

    private $fields = [];

    /**
     * Retorna a SQL
     * @return string
     */
    public function getSql()
    {
        $this->process();
        return $this->sql;
    }

    abstract protected function process();

    /**
     * Retorna a tabela
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param $table Tabela
     * @param array $fields Campos
     * @return AbstractSql
     */
    public function setTable($table, array $fields = ['*'])
    {
        $this->table = $table;
        $this->fields = $fields;
        return $this;
    }

    /**
     * Retorna os campos
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    abstract public function setData(ValueInterface $data);

}