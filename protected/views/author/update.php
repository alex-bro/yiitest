<?php
/* @var $this AuthorController */
/* @var $model Author */

$this->breadcrumbs=array(
	'Писатели'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список писателей', 'url'=>array('index')),
	array('label'=>'Добавить писателя', 'url'=>array('create')),
	array('label'=>'Просмотреть писателя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление писателем', 'url'=>array('admin')),
);
?>

<h1>Изменить писателя <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>