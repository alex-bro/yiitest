<div class="row">
    <div class="col-md-12">
        <h3>Выберите писателя</h3>
        <form action="/front/default/author" method="post">
            <p><select  name="search-author" class="form-control" >
                    <option disabled selected></option>
                    <?php foreach($author as $item) :?>
                        <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                    <?php endforeach;?>
                </select></p>
            <p><input type="submit" value="Отправить" class="btn btn-default pull-right"></p>
        </form>
    </div>
</div>