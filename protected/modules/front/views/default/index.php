
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-9" id="red">
            <?php
                if(isset($model))foreach($model as $item){ $this->renderPartial('_item',['item' => $item]); }
                else $this->renderPartial('_empty');
            ?>
        </div>
        <div class="col-md-4 col-lg-3" id="blue">
            <div class="row">
                <div class="col-md-12">
                    <?php $this->renderPartial('_caregory',['categories' => DefaultController::getCat()]); ?>
                    <?php $this->renderPartial('_publishers',['publishers' => Publishing::model()->findAll()]); ?>
                    <?php $this->renderPartial('_author',['author' => Author::model()->findAll()]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php if(isset($model)) $this->widget('CLinkPager', array('pages' => $pages, ))?>
</div>
