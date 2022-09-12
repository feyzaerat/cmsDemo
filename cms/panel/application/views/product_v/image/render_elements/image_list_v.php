<?php if(empty($item_images)) { ?>

    <div class="alert alert-info text-center">
        <p><?php echo lang('there-is-no-entry')?></a></p>
    </div>

<?php } else { ?>

    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th><?php echo lang('image')?></th>
        <th><?php echo lang('title')?></th>
        <th><?php echo lang('status')?></th>
        <th><?php echo lang('cover')?></th>
        <th style="width: 5%"><?php echo lang('actions')?></th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("Product/imageRankSetter"); ?>">

        <?php foreach($item_images as $image){ ?>

            <tr id="ord-<?php echo $image->id; ?>">
                <td><i class="fa fa-reorder"></i></td>
                <td class="w100 text-center">#<?php echo $image->id; ?></td>
                <td class="w100 text-center">
                    <img width="30" src="<?php echo base_url("uploads/{$vFolder}/$image->img_url"); ?>" alt="<?php echo $image->img_url; ?>" class="img-responsive">
                </td>
                <td><?php echo $image->img_url; ?></td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("Product/imageIsActiveSetter/$image->id"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#dca4c4"
                        <?php echo ($image->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("Product/isCoverSetter/$image->id/$image->product_id"); ?>"
                            class="isCover"
                            type="checkbox"
                            data-switchery
                            data-color="#8cc5f1"
                        <?php echo ($image->isCover) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center"style="margin: 0 auto">
                     <?php if (isAllowedDeleteModule()){?>
                    <button
                            data-url="<?php echo base_url("Product/imageDelete/$image->id/$image->product_id"); ?>"
                            class="btn btn-sm btn-warning remove-btn btn-block prdctBtn" title="<?php echo lang('delete')?>">
                        <i class="fa fa-trash"></i>
                    </button>
                    <?php }?>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>
<?php } ?>