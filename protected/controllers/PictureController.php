<?php

class PictureController extends BackController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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



	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=false)
	{

        if ($id === false){
            $model=new Picture;
        } else {
            $model=$this->loadModel($id);
        }

        $msg = '';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Picture']))
		{
			$model->attributes=$_POST['Picture'];
            $path = Options::getOption('imgPath').'/'.date('Y').'/'.date('m').'/'.date('his').'-';
            $model->image = $path.CUploadedFile::getInstance($model,'image');
			if($model->save())
                $pathTo=$_SERVER['DOCUMENT_ROOT'].$model->image;
                $pathFrom = $_FILES['Picture']['tmp_name']['image'];
                Controller::createPathUploadsNow();
                if (!copy($pathFrom, $pathTo)) {
                    $msg = '<p style="color: red; margin: 5px; border: 1px solid red; text-align: center">Файл не был записан.</p>';
                } else {
                    chmod($pathTo, 0777);
                    $msg = '<p style="color: green; margin: 5px; border: 1px solid green; text-align: center">Файл был записан.</p>';
                }
		}

		$this->render('create',array(
			'model'=>$model,'msg'=>$msg,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->actionCreate($id);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $path = $_SERVER['DOCUMENT_ROOT'].Picture::model()->findByPk($id)->image;
        if(is_file($path)) unlink($path);
		$this->loadModel($id)->delete();



		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Picture', array(
            'pagination'=>array(
                'pageSize'=> $this->pageSize),
        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Picture('search');
		//$model=Picture::getRelation();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Picture']))
			$model->attributes=$_GET['Picture'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Picture the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Picture::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Picture $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='picture-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
