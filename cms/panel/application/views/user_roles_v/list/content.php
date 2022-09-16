<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo lang('user-roles')?>
            <a href="<?php echo base_url("add-new-user-role"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget  p-b-xl " style="overflow-x:auto;"">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("add-new-user-role"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th style="width: 1%">#id</th>
                        <th><?php echo lang('title')?></th>
                        <th style="width: 5%"><?php echo lang('status')?></th>
                        <th style="width: 12%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody data-url="<?php echo base_url("User_roles/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td> <?php echo $item->id; ?></td>
                                <td> <?php echo $item->title; ?></td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("User_roles/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("User_roles/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }}?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url("User_roles/updateForm/$item->id"); ?>" class="btn btn-sm btn-info  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <a title="<?php echo lang('change-permission')?>" href="<?php echo base_url("User_roles/PermissionsForm/$item->id"); ?>" class="btn btn-sm btn-dark  prdctBtn"><i class="fa fa-eye"></i> </a>
                                    <?php }?>
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