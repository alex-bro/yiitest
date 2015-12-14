<?php /* @var $this Controller */ ?>
<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="ru">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<body>
    <?php $this->renderPartial('header');?>
    <?php echo $content; ?>
    <?php $this->renderPartial('footer');?>
</body>
</html>
