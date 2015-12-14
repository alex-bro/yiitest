<?php
/* @var $this PublishingController */
/* @var $model Publishing */

$this->breadcrumbs=array(
	'Издательства'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список издателей', 'url'=>array('index')),
	array('label'=>'Добавить издателя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#publishing-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление издательствами</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'publishing-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'address',
		'phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
