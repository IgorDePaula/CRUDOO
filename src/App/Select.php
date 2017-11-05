<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:31
 */

namespace App;


use App\Data\ValueInterface;
use App\Parameters\Parameters;

class Select extends AbstractSql
{

    protected $where;

    public function __construct()
    {
        $this->sql = 'SELECT %s FROM %s WHERE %s';
    }

    public function getFields()
    {
        return implode(', ', $this->fields);
    }

    protected function process()
    {
        $this->sql = sprintf($this->sql, $this->getFields(), $this->getTable(), $this->where);
    }

    public function setData(ValueInterface $data)
    {
        // TODO: Implement setData() method.
    }

    public function where(Parameters $where)
    {
        $this->where = $where->interpret();
        $this->process();
    }

}
