<?php
/* @var $this PictureController */
/* @var $model Picture */

$this->breadcrumbs=array(
	'Картинки'=>array('index'),
	'Создать/Изменить',
);

$this->menu=array(
	array('label'=>'Список картинок', 'url'=>array('index')),
	array('label'=>'Управление картинками', 'url'=>array('admin')),
);
?>

<h1>Картинки</h1>
<?php echo $msg;?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>