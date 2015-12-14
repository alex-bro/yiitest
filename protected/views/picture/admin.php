<?php
/* @var $this PictureController */
/* @var $model Picture */

$this->breadcrumbs=array(
	'Картинки'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список картинок', 'url'=>array('index')),
	array('label'=>'Добавить картинку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#picture-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление картинками</h1>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'picture-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
        'book.name',
		array('name'=>'image',
            'type'=>'html',
            'value'=>'CHtml::link(CHtml::image($data->image), $data->image)',
            'htmlOptions'=>array('width'=>'100px', 'class'=>'mp'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
