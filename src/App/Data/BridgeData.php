<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/05/17
 * Time: 13:43
 */

namespace App\Data;


class BridgeData implements KeyInterface, IndexInterface
{

    private $data = [];
    private $index = null;
    private $key = [];
    private $value = '';
    private $dataProvider;

    /**
     * Retorna os dados a serem inseridos/atualizados
     * @return array|string
     */
    public function getData()
    {
        if ($this->index) {
            $this->process();
            return $this->getPairs();
        }
        return $this->data;
    }

    /**
     * Indica os dados a serem inseridos/atualizados
     * @param $data
     * @return BridgeData
     */
    public function setData($data)
    {
        count($this->key) > 0 ? $this->data = array_values($data) : $this->dataProvider = $data;
        return $this;
    }

    protected function process()
    {
        array_walk($this->dataProvider, [$this, 'createPairs']);
    }

    protected function getPairs()
    {
        return implode(', ', $this->data);
    }

    /**
     * Retorna o valor do indice a ser atualizado/deletado
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Indica o valor do indice a ser deletad/atualizado
     * @param $value
     * @return BridgeData
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Retorna o nome do indice
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Seta o parametro de atualizacao/delecao
     * @param $index
     * @return BridgeData
     */
    public function setIndex($index)
    {
        $this->index = $index;
        return $this;
    }

    /**
     * Retorna as chaves a serem inseridas/atualizadas
     * @return array
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Indica as chaves a serem inseridas
     * @param array $key
     * @return BridgeData
     */
    public function setKey(array $key)
    {
        $this->key = array_keys($key);
        return $this;
    }

    protected function createPairs($value, $column)
    {
        $this->data[] = "{$column}={$value}";
    }
}