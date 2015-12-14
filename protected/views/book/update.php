<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список книг', 'url'=>array('index')),
	array('label'=>'Добавить книгу', 'url'=>array('create')),
	array('label'=>'Просмотреть книгу', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление книгами', 'url'=>array('admin')),
);
?>

<h1>Изменить книгу <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>