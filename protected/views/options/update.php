<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список настроек', 'url'=>array('index')),
	array('label'=>'Добавить настройку', 'url'=>array('create')),
	array('label'=>'Просмотреть настройки', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление настройками', 'url'=>array('admin')),
);
?>

<h1>Изменить настройку <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>