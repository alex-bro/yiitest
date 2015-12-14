<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09.12.15
 * Time: 14:37
 */
class All extends CActiveRecord {

    public function getList($model){;
        $public = new $model();
        $pub = $public->findAll();
        $select = array();
        foreach ($pub as $item){
            $select[$item->id] = $item->name;
        }
        return $select;

    }
}