<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14/05/17
 * Time: 20:58
 */

namespace App;

use App\Data\ValueInterface;


/**
 * Class Update
 * @package App
 */
class Update extends AbstractSql
{
    private $dataProvider = [];
    private $pairs = '';
    /**
     * @var array
     */
    private $indexPair = '';

    public function __construct()
    {
        $this->sql = 'UPDATE %s SET %s WHERE %s';
    }

    /**
     * Indica os dados para serem atualizados Data para dados e Index para identificador do registro
     * @param $data array
     */
    public function setData(ValueInterface $data)
    {
        $this->setIndexPair($data->getIndex(), $data->getValue());
        $this->setPairs($data->getData());
    }

    protected function process()
    {
        $sql = $this->sql;
        $this->sql = sprintf($sql, $this->getTable(), $this->getPairs(), $this->getIndexPair());
    }

    /**
     * @return string
     */
    protected function getPairs()
    {
        return $this->pairs;
    }

    /**
     * @param string $pairs
     * @return Update
     */
    protected function setPairs($pairs)
    {
        $this->pairs = $pairs;
        return $this;
    }

    /**
     * @return array
     */
    public function getIndexPair()
    {
        return $this->indexPair;
    }

    /**
     * @param array $indexPair
     * @return Update
     */
    public function setIndexPair($index, $value)
    {
        $this->indexPair = "{$index}={$value}";
        return $this;
    }


}