<?php
/* @var $this PublishingController */
/* @var $model Publishing */

$this->breadcrumbs=array(
	'Издатели'=>array('index'),
	'Добавить издателя',
);

$this->menu=array(
	array('label'=>'Список издателей', 'url'=>array('index')),
	array('label'=>'Управление издателем', 'url'=>array('admin')),
);
?>

<h1>Добавить издателя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>