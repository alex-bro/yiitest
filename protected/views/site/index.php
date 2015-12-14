<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h2>Добро пожаловать в админку <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h2>

<h3>Информация о книжном каталоге</h3>

<p>Всего издателей - <?php echo $model['publishers'];?></p>
<p>Всего писателей - <?php echo $model['authors'];?></p>
<p>Всего книг - <?php echo $model['books'];?></p>
<p>Всего картинок - <?php echo $model['pictures'];?></p>