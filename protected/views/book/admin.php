<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Добавить книгу', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#book-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление книгами</h1>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'author.name',
		'name',
		'date',
        'category.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
