<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 25/06/17
 * Time: 15:03
 */

namespace App;


use App\Data\BridgeData;

class Sql
{

    public function insert($table, array $data){
        $insert = new Insert();
        $insert->setTable($table);
        $insert->setData((new BridgeData())->setKey($data)->setData($data));
        return $insert;
    }

    public function delete($table, $index, $value){
        $delete = new Delete();
        $delete->setTable($table);
        $delete->setData((new BridgeData())->setIndex($index)->setValue($value));
        return $delete;
    }

    public function update($table, array $data, $index, $value){
        $update = new Update();
        $update->setTable($table);
        $update->setData(
            (new BridgeData())
                ->setData($data)
                ->setIndex($index)
                ->setValue($value)
        );
        return $update;
    }

    public function select(){

    }
}