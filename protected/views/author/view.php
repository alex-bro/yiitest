<?php
/* @var $this AuthorController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Писатели'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список писателей', 'url'=>array('index')),
	array('label'=>'Добавить писателя', 'url'=>array('create')),
	array('label'=>'Изменить писателя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить писателя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление писателем', 'url'=>array('admin')),
);
?>

<h1>Просмотреть писателя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'publishing_id',
		'name',
	),
)); ?>
