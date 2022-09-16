<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
             <?php echo lang('logs')?>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget  p-b-xl " style="overflow-x:auto;padding: 5vw 1vw 1vw 1vw;">
                <?php if(empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> </p>
                </div>
                <?php } else { ?>
              <div class="table-responsive" style="padding-bottom: 3vw;">
                <table  id="default-datatable" data-plugin="DataTable" class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th style="width: 1%">#id</th>
                        <th style="width: 12%"><?php echo lang('date')?></th>
                        <th style="width: 20%"><?php echo lang('description')?></th>
                        <th style="width: 20%"><?php echo lang('ip-address')?></th>
                        <th style="width: 10%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item) { ?>
                            <tr>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo get_readable_hour($item->createdAt); ?></td>
                                <td><?php echo $item->comment; ?></td>
                                <td><?php echo $item->created_ip_address; ?></td>
                                <td class="text-center">
                                    <?php if (isAllowedDeleteModule()){?>
                                    <?php if(isDemoDelete()){?>
                                    <button
                                        data-url="<?php echo base_url("Logs/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"> </i>
                                    </button>
                                    <?php }}?>
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