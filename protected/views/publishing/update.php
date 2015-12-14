<?php
/* @var $this PublishingController */
/* @var $model Publishing */

$this->breadcrumbs=array(
	'Издатели'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список издателей', 'url'=>array('index')),
	array('label'=>'Добавить издателя', 'url'=>array('create')),
	array('label'=>'Просмотреть издателя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление издателем', 'url'=>array('admin')),
);
?>

<h1>Изменить издательство <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>