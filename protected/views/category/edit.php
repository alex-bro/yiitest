<h2>Редактирование категории</h2>
<h3>Категория: <span style="text-decoration:underline"><?php echo CHtml::encode($model->name);?></span></h3>
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'category-edit-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="row">
        <label for="nest-act">Действие</label>
            <select name="nest-act">
                <option selected disabled value="null">Выберите действие</option>
                <option value="create-parent">Создать подкаталог</option>
                <option value="rename">Переименовать каталог</option>
                <option value="delete" style="color: red">Удалить каталог</option>
            </select>
    </div>

    <div class="row">
        <input id="name_cat" type="text" name="name_cat" size="60" maxlength="255"
               style="height: 30px; width: 60%; display: none">
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton();?>
        <?php echo CHtml::resetButton();?>
    </div>

    <?php $this->endWidget(); ?>
</div>