<div class="row">
    <div class="col-md-12 ">
        <h4 class="m-b-lg ">
             <?php echo lang('mail-settings')?>
            <a href="<?php echo base_url("add-new-mail-setting"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget  resTable  p-b-xl " style="overflow-x:auto;"  >

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("add-new-mail-setting"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>

                <table class="table table-bordered table-hover table-striped content-container table-rounded  " >
                    <thead>
                        <th class="th" style="width: 1%"><i class="fa fa-reorder"></i></th>
                        <th class="th"style="width: 1%">#id</th>
                        <th class="th"style="width: 4%"><?php echo lang('username')?></th>
                        <th class=""style="width: 10%"><?php echo lang('mail-address')?></th>
                        <th class="th"style="width: 10%">Host</th>
                        <th class="th"style="width: 1%">Protocol</th>
                        <th class="th"style="width: 1%">Port</th>
                        <th class="th"style="width: 15%">From</th>
                        <th class="th"style="width: 12%">To</th>
                        <th class=""style="width: 1%"><?php echo lang('status')?></th>


                        <th class=""style="width: 1%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url('Email_settings/rankSetter'); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="td"><i class="fa fa-reorder"></i></td>
                                <td class="td" >#<?php echo $item->id; ?></td>
                                <td class="td"><?php echo $item->user_name; ?></td>
                                <td class="td"><?php echo $item->user; ?></td>
                                <td class="td"><?php echo $item->host; ?></td>
                                <td class="td"><?php echo $item->protocol; ?></td>
                                <td class="td"><?php echo $item->port; ?></td>
                                <td class="td"><?php echo $item->from; ?></td>
                                <td class="td"><?php echo $item->to; ?></td>
                                <td class="text-center ">
                                    <input
                                        data-url="<?php echo base_url("Email_settings/isActiveSetter/$item->id"); ?>"
                                        class="isActive"
                                        type="checkbox"
                                        data-switchery
                                        data-color="#f9c851"


                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td class="td">
                                <td class="text-center " style="width: 10%!important;">
                                    <?php if (isAllowedDeleteModule()){?>
                                    <?php if(isDemoDelete()){?>
                                    <button
                                        data-url="<?php echo base_url("Email_settings/delete/$item->id"); ?>"
                                        class="btn btn-xs btn-pink  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }}?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("Email_settings/updateForm/$item->id"); ?>" class="btn btn-xs btn-purple  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
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