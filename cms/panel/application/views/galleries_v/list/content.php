<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo lang('galleries')?>
            <a href="<?php echo base_url("Galleries/NewForm"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget  border-right:5px solid white p-b-xl "  style="overflow-x:auto;">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("Galleries/NewForm"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th><?php echo lang('gallery-title')?></th>
                        <th  style="width: 8%"><?php echo lang('gallery-type')?></th>
                        <th style="width: 15%"><?php echo lang('folder-name')?></th>
                        <th  style="width: 15%">URL</th>
                        <th><?php echo lang('status')?></th>
                        <th><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Galleries/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr  class="text-center" id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->gallery_type; ?></td>
                                <td><?php echo $item->folder_name; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("Galleries/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#dca4c4"


                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td>
                                    <?php if(isDemoDelete()){?>
                                    <?php if (isAllowedDeleteModule()){?>
                                    <button
                                        data-url="<?php echo base_url("Galleries/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }}?>

                                    <?php
                                    if($item->gallery_type == "image")
                                    {
                                        $buttonIcon = "fa-image";
                                        $buttonUrl = "Galleries/UploadForm/$item->id";
                                    }
                                    else if($item->gallery_type == "video")
                                    {
                                        $buttonIcon = "fa-play-circle-o";
                                        $buttonUrl = "Galleries/gallery_video_list/$item->id";

                                    }
                                    else
                                        {
                                        $buttonIcon = "fa-folder";
                                        $buttonUrl = "Galleries/UploadForm/$item->id";
                                        }

                                    ?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("Galleries/updateForm/$item->id"); ?>" class="btn btn-sm btn-primary prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <?php }?>
                                    <a title="<?php echo lang('view-gallery')?>" href="<?php echo base_url($buttonUrl); ?>" class="btn btn-sm btn-warning  prdctBtn"><i class="fa <?php echo $buttonIcon?>"></i> </a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>
            </div>
            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>