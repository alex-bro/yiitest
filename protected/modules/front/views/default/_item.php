<div class="book">
    <h3 ><?php echo $item['name'] ;?></h3>
    <div class="pic ">
        <?php if(isset($item['pictures'][0])) { ?>
            <img src="<?php echo $item['pictures'][0]; ?>" alt="">
        <?php  }else {  ?>
            <img src="<?php echo Yii::app()->getBaseUrl(true);?>/images/pics/no.png" alt="">
        <?php } ?>
    </div>
    <p class="author">Автор: <?php echo $item['author'] ;?></p>
    <p>Категория: <?php echo $item['category'] ;?></p>
    <p>Издательство: <?php echo $item['publisher'] ;?></p>
    <p>Год: <?php echo $item['date'] ;?></p>
    <div class="pics mp">
        <?php if(isset($item['pictures'][0])) :?>
            <?php foreach($item['pictures'] as $pic):?>
                <a href="<?php echo Yii::app()->getBaseUrl(true) . $pic;?>"><img src="<?php echo Yii::app()->getBaseUrl(true) . $pic;?>" alt=""></a>
            <?php endforeach?>    
        <?php endif;?>
    </div>


    <?php //echo $item[name ;?>
</div>



