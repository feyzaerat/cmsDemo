
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->full_name</b> ".lang('is-updating')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Users/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo lang('full-name')?></label>
                                        <input class="form-control" placeholder="<?php echo lang('full-name')?>" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name; ?>">
                                        <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("full_name"); ?></small><?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo lang('username')?></label>
                                        <input class="form-control" placeholder="<?php echo lang('username')?>" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name ; ?>">
                                        <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small><?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo lang('mail-address')?></label>
                                        <input class="form-control" type="email" placeholder="<?php echo lang('mail-address')?>" name="email" value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                                        <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small><?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo lang('phone')?></label>
                                        <input class="form-control" type="text" placeholder="<?php echo lang('phone')?>" name="phone" value="<?php echo isset($form_error) ? set_value("phone") : $item->phone; ?>">
                                        <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("phone"); ?></small><?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo lang('user-roles')?></label>
                                        <select class="form-control" name="user_role_id">
                                            <?php foreach ($user_roles as $user_role) {?>
                                                <?php echo ($user_role->id==$item->user_role_id) ? "selected" : "" ;?>
                                                <option value="<?php echo $user_role->id; ?>"><?php echo $user_role->title; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="image_upload_container" >
                                            <label><?php echo lang('choose-a-photo')?></label>
                                            <input type="file" name="img_url" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <img  src="<?php echo base_url("uploads/$vFolder/$item->img_url"); ?>" alt="<?php echo base_url("uploads/$vFolder/$item->img_url"); ?>" class="img-rounded user-form-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class=" btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
                    <a href="<?php echo base_url("Users"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>