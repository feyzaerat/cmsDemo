<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php if (isAllowedWriteModule()){?>
            <?php echo lang('users')?>
            <a href="<?php echo base_url("add-new-user"); ?>" class="add btn  btn-xs pull-right"> <i class="fa fa-plus"></i> <?php echo lang('add-new')?></a>
            <?php }?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-b-xl "  style="overflow-x:auto;">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p><?php echo lang('no-data')?> <?php echo lang('for-add')?> <a href="<?php echo base_url("add-new-user"); ?>"><?php echo lang('click-here')?></a></p>
                </div>

            <?php } else { ?>

                <table class="table table-bordered table-hover table-striped content-container table-rounded">
                    <thead>
                        <th><i class="fa fa-reorder"></i></th>
                        <th>#id</th>
                        <th><?php echo lang('username')?></th>
                        <th><?php echo lang('full-name')?></th>
                        <th><?php echo lang('mail-address')?></th>
                        <th><?php echo lang('profile')?></th>
                        <th><?php echo lang('status')?></th>
                        <th style="width: 15%"><?php echo lang('actions')?></th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("Users/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>

                            <tr id="ord-<?php echo $item->id; ?>">
                                <td><i class="fa fa-reorder"></i></td>
                                <td>#<?php echo $item->id; ?></td>
                                <td><?php echo $item->user_name; ?></td>
                                <td><?php echo $item->full_name; ?></td>
                                <td><?php echo $item->email; ?></td>
                                <td>

                                    <img  height="100" width="100" src="<?php echo base_url("uploads/{$vFolder}/$item->img_url"); ?>" alt="<?php echo $item->img_url; ?>" class="img-rounded">

                                </td>
                                <td>
                                    <input
                                        data-url="<?php echo base_url("Users/isActiveSetter/$item->id"); ?>"
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
                                        data-url="<?php echo base_url("Users/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-pink  remove-btn prdctBtn" title="<?php echo lang('delete')?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <?php }} ?>
                                    <?php if (isAllowedUpdateModule()){?>
                                    <a title="<?php echo lang('update')?>" href="<?php echo base_url('Users/updateForm/').$item->id; ?>" class="btn btn-sm btn-purple  prdctBtn"><i class="fa fa-pencil-square-o"></i> </a>
                                    <?php }?>
                                    <a title="<?php echo lang('change-password')?>" href="<?php echo base_url("Users/updatePasswordForm/$item->id"); ?>" class="btn btn-sm btn-success  prdctBtn"><i class="fa fa-key"></i> </a>

                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>