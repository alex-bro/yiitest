<?php
/* @var $this OptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Настройки',
);

$this->menu=array(
	array('label'=>'Добавить настройку', 'url'=>array('create')),
	array('label'=>'Управление настройками', 'url'=>array('admin')),
);
?>

<h1>Настройки</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
