<?php
/* @var $this AuthorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Писатели',
);

$this->menu=array(
	array('label'=>'Добавить автора', 'url'=>array('create')),
	array('label'=>'Управление писателем', 'url'=>array('admin')),
);
?>

<h1>Писатели</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
