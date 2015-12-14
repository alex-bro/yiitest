<?php

class BackController extends Controller {
    public function beforeAction($action){
        Yii::app()->bootstrap->register();
        return parent::beforeAction($action);
    }
}