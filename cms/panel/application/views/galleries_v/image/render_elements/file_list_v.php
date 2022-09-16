<?php if(empty($items)) { ?>

    <div class="alert alert-info text-center">
        <p><?php echo lang('there-is-no-entry')?></a></p>
    </div>

<?php } else { ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th>#id</th>
        <th><?php echo lang('image')?></th>
        <th><?php echo lang('folder-path-name')?></th>
        <th><?php echo lang('status')?></th>
        <th style="width: 5%"><?php echo lang('actions')?></th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("Galleries/fileRankSetter/$gallery_type"); ?>">

        <?php foreach($items as $item){ ?>

            <tr id="ord-<?php echo $item->id; ?>">
                <td><i class="fa fa-reorder"></i></td>
                <td class="w100 text-center">#<?php echo $item->id; ?></td>
                <td class="w100 text-center">
                    <?php if($gallery_type == "image"){?>
                        <img width="30" src="<?php echo base_url("$item->url"); ?>" alt="<?php echo $item->url; ?>" class="img-responsive">
                    <?php } else if ($gallery_type == "file") {?>
                        <i class="fa fa-file fa-2x"></i>
                    <?php }?>

            </td>
                <td><?php echo $item->url; ?></td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("Galleries/fileIsActiveSetter/$item->id/$gallery_type"); ?>"
                            class="isActive"
                            type="checkbox"
                            data-switchery
                            data-color="#dca4c4"
                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center"style="margin: 0 auto">
                  <?php if (isAllowedDeleteModule()){?>
                    <?php if(isDemoDelete()){?>
                        <button
                                data-url="<?php echo base_url("Galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>"
                                class="btn btn-sm btn-pink  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                            <i class="fa fa-trash"></i>
                        </button>
                    <?php } }?>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>
    </div>
<?php } ?>