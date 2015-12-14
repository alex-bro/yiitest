<?php
/* @var $this PublishingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Издатели',
);

$this->menu=array(
	array('label'=>'Добавить издателя', 'url'=>array('create')),
	array('label'=>'Управление издателем', 'url'=>array('admin')),
);
?>

<h1>Издатели</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
