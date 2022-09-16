<?php $user = getActiveUser();?>

<form action="<?php echo base_url('CreateTable/add')?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="table_name">
        <input type="text" name="table_name_cont_class" value="<?php $tabLeName?>">

        <input type="submit" value="Add">
    </div>
</form>