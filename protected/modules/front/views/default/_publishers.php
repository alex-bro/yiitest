<div class="row">
    <div class="col-md-12">
        <h3>Выберите издателя</h3>
        <form action="/front/default/publisher" method="post">
            <p><select  name="search-publishers" class="form-control" >
                    <option disabled selected></option>
                    <?php foreach($publishers as $item) :?>
                        <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                    <?php endforeach;?>
                </select></p>
            <p><input type="submit" value="Отправить" class="btn btn-default pull-right"></p>
        </form>
    </div>
</div>


