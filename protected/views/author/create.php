<?php
/* @var $this AuthorController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Писатели'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список писателей', 'url'=>array('index')),
	array('label'=>'Управление писателем', 'url'=>array('admin')),
);
?>

<h1>Добавить писателя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>