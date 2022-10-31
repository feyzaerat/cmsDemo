<div role="tabpanel" class="tab-pane in active fade" id="tab-1">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('full-name')?></label>
                <input name="full_name" class="form-control" placeholder="<?php echo lang('full-name')?>"  >
            </div>
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('password')?></label>
                <input class="form-control" placeholder="<?php echo lang('password')?>" name="password" type="password">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('username')?></label>
                <input class="form-control" placeholder="<?php echo lang('username')?>" name="user_name">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small>
                <?php } ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('re-password')?></label>
                <input class="form-control" placeholder="<?php echo lang('re-password')?>" name="password" type="password">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("re-password"); ?></small>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('mail-address')?></label>
                <input name="email" class="form-control" placeholder="<?php echo lang('mail-address')?>" type="email">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small>
                <?php } ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <label><?php echo lang('phone')?></label>
                <input name="phone" class="form-control" placeholder="<?php echo lang('phone')?>" type="text">
            </div>
        </div>
    </div>

</div>