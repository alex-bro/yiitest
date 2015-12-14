<?php

class CategoryController extends BackController
{

    public $defaultAction = 'index';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function actionEdit($id){
        //var_dump($_POST);
        if($_POST && $id){
            if($_POST['nest-act'] == 'create-parent' && $_POST['name_cat']!== ''){
                //echo '<script>alert("111")</script>';
                $node = Category::model()->findByPk($id);
                $category=new Category;
                $category->name = CHtml::encode($_POST['name_cat']);
                $category->appendTo($node);
                //$this->actionIndex();
            }
            if($_POST['nest-act'] == 'delete' && $id !== '11'){
                $node = Category::model()->findByPk($id);
                $node->deleteNode();

            }
            if($_POST['nest-act'] == 'rename'){
                $node = Category::model()->findByPk($id);
                $node->name = CHtml::encode($_POST['name_cat']);
                $node->saveNode();
            }
            header ('Location: /category');
            die();
        }
        $param = Category::model()->findByPk($id);
        $this->render('edit',['model' => $param]);
    }

	public function actionIndex(){

        if($_POST){

        }
		$this->render('index',['categories' => $this->getTree()]);
	}

    public function getTree(){
        $criteria=new CDbCriteria;
        $criteria->order='t.lft';
        $catRoot = new Category;
        return $catRoot->findAll($criteria);
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}