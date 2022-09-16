<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-user')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Users/save"); ?>" method="post" enctype="multipart/form-data">
                      <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('full-name')?></label>
                                    <input name="full_name" class="form-control" placeholder="<?php echo lang('full-name')?>"  >
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('username')?></label>
                                    <input class="form-control" placeholder="<?php echo lang('username')?>" name="user_name">
                                    <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small><?php } ?>
                                </div>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('password')?></label>
                                    <input class="form-control" placeholder="<?php echo lang('password')?>" name="password" type="password">
                                    <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small><?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('re-password')?></label>
                                    <input class="form-control" placeholder="<?php echo lang('re-password')?>" name="re_password" type="password">
                                    <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("re_password"); ?></small><?php } ?>
                                </div>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('mail-address')?></label>
                                    <input name="email" class="form-control" placeholder="<?php echo lang('mail-address')?>" type="email">
                                    <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small><?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('phone')?></label>
                                    <input name="phone" class="form-control" placeholder="<?php echo lang('phone')?>" type="text">
                                    <?php if(isset($form_error)){ ?><small class="pull-right input-form-error"> <?php echo form_error("phone"); ?></small><?php } ?>
                                </div>
                            </div>
                      </div>
                      <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label><?php echo lang('user-roles')?></label>
                                    <select class="form-control" name="user_role_id">
                                        <?php foreach ($user_roles as $user_role) {?>
                                            <option value="<?php echo $user_role->id; ?>"><?php echo $user_role->title; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class=" image_upload_container">
                                        <label><?php echo lang('choose-a-photo')?></label>
                                        <input name="img_url" class="form-control"   type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                      <?php if(isDemo()){ ?>
                      <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                      <?php }?>
                      <a href="<?php echo base_url("Users"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>