<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Книги',
);

$this->menu=array(
	array('label'=>'Добавить книгу', 'url'=>array('create')),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<h1>Книги</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
