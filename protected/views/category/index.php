<div class="nest">
    <?php
    $level=0;
    foreach($categories as $n=>$category)
    {
        if($category->level==$level)
            echo CHtml::closeTag('li');
        else if($category->level>$level)
            echo CHtml::openTag('ul');
        else
        {
            echo CHtml::closeTag('li');

            for($i=$level-$category->level;$i;$i--)
            {
                echo CHtml::closeTag('ul');
                echo CHtml::closeTag('li');
            }
        }

        echo CHtml::openTag('li');
        echo '<a href="'.Yii::app()->createUrl('category/edit',['id'=>$category->id]).'">'.CHtml::encode($category->name).'</a>';
        $level=$category->level;
    }

    for($i=$level;$i;$i--)
    {
        echo CHtml::closeTag('li');
        echo CHtml::closeTag('ul');
    }
    ?>
</div>
