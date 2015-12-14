<?php
/* @var $this PictureController */
/* @var $model Picture */

$this->breadcrumbs=array(
	'Картинки'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список картинок', 'url'=>array('index')),
	array('label'=>'Добавить картинку', 'url'=>array('create')),
	array('label'=>'просмотреть картинку', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление картинками', 'url'=>array('admin')),
);
?>

<h1>Update Picture <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>