<?php
/* @var $this OptionsController */
/* @var $model Options */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список настроек', 'url'=>array('index')),
	array('label'=>'Управление настройками', 'url'=>array('admin')),
);
?>

<h1>Добавить настройку</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>