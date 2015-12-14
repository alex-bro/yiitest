<?php
/* @var $this PublishingController */
/* @var $model Publishing */

$this->breadcrumbs=array(
	'Издатели'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список издателей', 'url'=>array('index')),
	array('label'=>'Добавить издателя', 'url'=>array('create')),
	array('label'=>'Изменить издателя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить издателя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление издателем', 'url'=>array('admin')),
);
?>

<h1>Просмотр издателя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'address',
		'phone',
	),
)); ?>
