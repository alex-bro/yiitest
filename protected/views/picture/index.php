<?php
/* @var $this PictureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Картинки',
);

$this->menu=array(
	array('label'=>'Добавить картинку', 'url'=>array('create')),
	array('label'=>'Управление картинками', 'url'=>array('admin')),
);
?>

<h1>Pictures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
