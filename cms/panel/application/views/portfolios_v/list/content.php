<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo lang('portfolios')?>
            <a href="<?php echo base_url("Portfolios/NewForm"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-b-xl " style="overflow-x:auto;">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("Portfolios/NewForm"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>

                <table class="table table-bordered table-hover table-striped content-container table-rounded text-center " style="overflow-x:auto;">
                    <thead class="text-center">
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th><?php echo lang('title')?></th>
                        <th>URL</th>
                        <th><?php echo lang('category')?></th>
                        <th><?php echo lang('customer')?></th>
                        <th><?php echo lang('end-date')?></th>
                        <th><?php echo lang('status')?></th>
                        <th style="width: 15%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Portfolios/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo $item->url; ?></td>
                                <td><?php echo getCategoryTitle($item->category_id); ?></td>
                                <td><?php echo $item->client; ?></td>
                                <td><?php echo get_readable_date($item->finishedAt); ?></td>

                                <td>
                                    <input
                                        data-url="<?php echo base_url("Portfolios/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("Portfolios/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }}?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("Portfolios/updateForm/$item->id"); ?>" class="btn btn-sm btn-info  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <a title="<?php echo lang('gallery')?>" href="<?php echo base_url("Portfolios/ImageForm/$item->id"); ?>" class="btn btn-sm btn-dark  prdctBtn"><i class="fa fa-image"></i> </a>
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