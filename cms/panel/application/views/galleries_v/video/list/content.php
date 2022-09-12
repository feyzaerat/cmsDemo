<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo" <b>$gallery->title</b>".lang('of-entries-v')?>
            <a href="<?php echo base_url("Galleries/newGalleryVideoForm/$gallery->id"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("Galleries/newGalleryVideoForm/$gallery->id"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>

                <table class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th style="width: 1%">#id</th>
                        <th>URL</th>
                        <th style="width: 10%"><?php echo lang('image')?></th>
                        <th style="width: 5%"><?php echo lang('status')?></th>
                        <th style="width: 12%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Galleries/rankGalleryVideoSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td class="text-center"><?php echo $item->url; ?></td>
                                <td>
                                         <iframe
                                                 width="200"
                                                 height="200"
                                                 src="<?php echo $item->url;?>"
                                                 frameborder="0"
                                                 allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                                 allowfullscreen
                                                 class="img-rounded"
                                                 >

                                         </iframe>



                                </td>

                                <td>
                                    <input
                                        data-url="<?php echo base_url("Galleries/GalleryVideoisActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#f9c851"


                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                      <?php if (isAllowedDeleteModule()){?>
                                <?php if(isDemoDelete()){?>
                                        <button
                                                data-url="<?php echo base_url("Galleries/GalleryVideoDelete/$item->id/$item->gallery_id"); ?>"
                                                class="btn btn-sm btn-pink  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    <?php }} ?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("Galleries/updateGalleryVideoForm/$item->id"); ?>" class="btn btn-sm btn-info  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                        <?php } ?>

                    </tbody>

                </table>



        </div><!-- .widget -->
    </div><!-- END column -->
</div>