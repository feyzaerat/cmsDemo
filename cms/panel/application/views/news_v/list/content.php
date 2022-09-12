<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo lang('news')?>
            <a href="<?php echo base_url("add-news"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-b-xl "  style="overflow-x:auto;">
            <?php if(empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("add-news"); ?>"><?php echo lang('click-here')?></a></p>
                </div>
            <?php } else { ?>

                <table class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th style="width: 1%">#id</th>
                        <th><?php echo lang('title')?></th>
                        <th>URL</th>
                        <th><?php echo lang('description')?></th>
                        <th style="width: 5%"><?php echo lang('news-type')?></th>
                        <th style="width: 10%"><?php echo lang('image')?></th>
                        <th style="width: 5%"><?php echo lang('status')?></th>
                        <th style="width: 12%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("News/rankSetter"); ?>">
                        <?php foreach($items as $item) { ?>
                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td><?php echo $item->description; ?></td>
                                <td><?php echo $item->news_type; ?></td>
                                <td>
                                    <?php if($item->news_type == "image") {?>
                                        <img  height="100" width="100" src="<?php echo base_url("uploads/{$vFolder}/$item->img_url"); ?>" alt="<?php echo $item->img_url; ?>" class="img-rounded">
                                    <?php } else if ($item->news_type == "video") {?>
                                         <iframe
                                                 width="200"
                                                 height="100"
                                                 src="<?php echo $item->video_url;?>"
                                                 frameborder="0"
                                                 allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                                 allowfullscreen
                                                 class="img-rounded"
                                                 >
                                         </iframe>
                                    <?php }?>
                                </td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("News/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("News/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }}?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("News/updateForm/$item->id"); ?>" class="btn btn-sm btn-info  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>