<?php

class DefaultController extends Controller
{

    public $layout='/layouts/column1';

    public $defaultAction = 'index';

    public static function getCat(){
        $criteria = new CDbCriteria;
        $criteria->order = 't.lft';
        $catRoot = new Category;
        return $catRoot->findAll($criteria);
    }

    public function actionAuthor(){
        if($_POST){
            $id = CHtml::encode($_POST['search-author']);
            $criteria = new CDbCriteria();
            $criteria->compare('author_id', $id);
            $pages=new CPagination(Book::model()->count($criteria));
            $pages->pageSize=Options::getOption('PostOnPage');
            $pages->applyLimit($criteria);
            $model = Book::model()->findAll($criteria);
            $books = array();
            foreach($model as $item){
                $books[] = Front::getBookAll($item->id);
            }
            if($books){
                $this->render('index',['model' => $books,'pages' => $pages]);
            } else {
                $this->render('index');
            }

        }
    }
	public function actionPublisher(){
        if($_POST){
            //айди издателя
            $idPublisher = CHtml::encode($_POST['search-publishers']);
            $criteria = new CDbCriteria();
            // критерий поиска авторов
            $criteria->compare('publishing_id', $idPublisher);
            // собираем всех авторов
            $modelAuthors = Author::model()->findAll($criteria);
            // все айди авторов
            $arr =array();
            foreach($modelAuthors as $item){
                $arr[] = $item->id;
            }
            if($arr){
                $criteria = new CDbCriteria();
                $criteria->compare('author_id', $arr);
                $pages=new CPagination(Book::model()->count($criteria));
                $pages->pageSize = Options::getOption('PostOnPage');
                $pages->applyLimit($criteria);
                $model = Book::model()->findAll($criteria);
                $books = array();
                foreach($model as $item){
                    $books[] = Front::getBookAll($item->id);
                }
                $this->render('index',['model' => $books, 'pages' => $pages]);
            } else {
                $this->render('index');
            }

        }
    }
    public function actionCategory($id){
        $criteria = new CDbCriteria();
        $category=Category::model()->findByPk($id);
        $descendants=$category->descendants()->findAll();
        $arr =array();
        foreach($descendants as $item){
            $arr[] = $item->id;
        }
        $criteria->compare('category_id', $arr);
        $pages=new CPagination(Book::model()->count($criteria));
        $pages->pageSize=Options::getOption('PostOnPage');
        $pages->applyLimit($criteria);
        $model = Book::model()->findAll($criteria);
        $books = array();
        foreach($model as $item){
            $books[] = Front::getBookAll($item->id);
        }
        $this->render('index',['model' => $books, 'pages' => $pages]);
    }

    public function actionIndex()
	{
        $criteria = new CDbCriteria();
        $pages=new CPagination(Book::model()->count($criteria));
        $pages->pageSize=Options::getOption('PostOnPage');
        $pages->applyLimit($criteria);
        $model = Book::model()->findAll($criteria);
        $books = array();
        foreach($model as $item){
            $books[] = Front::getBookAll($item->id);
        }
		$this->render('index',['model' => $books, 'pages' => $pages]);
	}

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','category','publisher'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','index','view','create','update',),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * @param CAction $action
     * @return bool
     * @var Bootstrap Yii
     */
    public function beforeAction($action){
        $this->pageSize = Options::getOption('PostOnPage');
       $cs = Yii::app()->clientScript;
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap-theme.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/magnific-popup.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/front.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/jquery-1.11.3.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/bootstrap.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/jquery.magnific-popup.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/yiitest.js', CClientScript::POS_END);
        return parent::beforeAction($action);
    }
}