<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Options'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список настроек', 'url'=>array('index')),
	array('label'=>'Добавить настройку', 'url'=>array('create')),
	array('label'=>'Изменить настройку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить настройку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление настройками', 'url'=>array('admin')),
);
?>

<h1>Просмотреть настройку</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'key',
		'value',
		'name',
	),
)); ?>
