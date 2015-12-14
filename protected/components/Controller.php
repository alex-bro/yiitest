<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    /**
     * @var null|string
     */
    public $pageSize = '';

    public $defaultAction = 'admin';
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','index','view','create','update','upload', 'edit'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function beforeAction($action){
        $this->pageSize = Options::getOption('PostOnPage');
        $cs = Yii::app()->clientScript;
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/magnific-popup.css');
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/yiitest.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/jquery.magnific-popup.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('webroot')
                . '/js/'). '/yiitest.js', CClientScript::POS_END);
        return parent::beforeAction($action);
    }

    public static function createPathUploadsNow(){
        $target0 = $_SERVER['DOCUMENT_ROOT'].Options::getOption('imgPath').'/'.date('Y');
        $target1 = $_SERVER['DOCUMENT_ROOT'].Options::getOption('imgPath').'/'.date('Y').'/'.date('m');
        if(!is_dir($target0)) {
            mkdir($target0) ;
            chmod($target0, 0777);
        }
        if(!is_dir($target1)){
            mkdir($target1) ;
            chmod($target1, 0777);
        }
    }
}