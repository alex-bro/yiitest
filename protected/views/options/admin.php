<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список настроек', 'url'=>array('index')),
	array('label'=>'Добавить настройку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#options-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление настройками</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'options-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'key',
		'value',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
