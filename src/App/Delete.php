<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07/05/17
 * Time: 18:09
 */

namespace App;

use App\Data\IndexInterface;
use App\Data\ValueInterface;
use InvalidArgumentException;


/**
 * Class Delete
 * @package App
 */
class Delete extends AbstractSql
{
    /**
     * @var string
     */
    private $index = '';

    /**
     * @var string
     */
    private $value = '';

    public function __construct()
    {
        $this->sql = 'DELETE FROM %s WHERE %s=%s';
    }

    /**
     * @inheritdoc
     */
    public function setData(ValueInterface $data)
    {
        if (!in_array(IndexInterface::class, class_implements($data))) {
            throw new InvalidArgumentException('The argument provided must be IndexInterface type.');
        }
        $this->setIndex($data->getIndex());
        $this->setValue($data->getValue());
    }

    /**
     * @inheritdoc
     */
    protected function process()
    {
        $format = $this->sql;
        $this->sql = sprintf($format, $this->getTable(), $this->getIndex(), $this->getValue());
    }

    /**
     * Retorna o indice
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Indica o indice
     * @param string $index Indice
     * @return Delete
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * $retorna o valor do indice
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Indica o valor do indice
     * @param string $value Valor do indice
     * @return Delete
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }


}