<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->full_name </b>".lang('password-change'); ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Users/updatePassword/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label><?php echo lang('new-password')?></label>
                        <input class="form-control" placeholder="&#11044&#11044&#11044&#11044&#11044&#11044" type="password" name="password" value="">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('re-password')?></label>
                        <input class="form-control" placeholder="&#11044&#11044&#11044&#11044&#11044&#11044" type="password"name="re_password" value="">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("re_password"); ?></small>
                        <?php } ?>
                    </div>



                    <?php if(isDemoUpdate()){ ?>
        <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
        <?php }?>
                    <a href="<?php echo base_url("Users"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>