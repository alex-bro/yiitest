<?php
class Category extends All {

    public function behaviors(){
        return array(
            'NestedSetBehavior'=>array(
                // перепишем путь как будто файл расширения лежит в protected/components
                'class'=>'application.components.NestedSetBehavior', // путь  в стиле "yii псевдонимов"
                'leftAttribute'=>'lft',
                'rightAttribute'=>'rgt',
                'levelAttribute'=>'level',
            ));
    }

    public function tableName()
    {
        return 'category';
    }

    public function attributeLabels()
    {
        return array(
            'name' => 'Категория',
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function relations(){
        return array(
            'books' => array(self::HAS_MANY, 'Book', 'category_id'),
        );
    }

}