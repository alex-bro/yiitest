<?php
/* @var $this PictureController */
/* @var $model Picture */

$this->breadcrumbs=array(
	'Картинки'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список картинок', 'url'=>array('index')),
	array('label'=>'Добавить картинку', 'url'=>array('create')),
	array('label'=>'Изменить картинку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить картинку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление картинками', 'url'=>array('admin')),
);
?>

<h1>Просмотр картинки</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'book.name',
        array('name'=>'image',
            'type'=>'html',
            'value'=>CHtml::link(CHtml::image($model->image), $model->image),

        ),
	),
)); ?>
