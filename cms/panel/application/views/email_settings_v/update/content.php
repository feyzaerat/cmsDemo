<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->user_name </b>". lang('is-updating')?>
        </h4>
    </div><!-- END column -->



    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Email_settings/update/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>Protocol</label>
                        <input name="protocol" class="form-control" placeholder="Protocol" value="<?php echo isset($form_error) ? set_value("protocol") : $item->protocol?>"  >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("protocol"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Host</label>
                        <input class="form-control" placeholder="Host" name="host"  value="<?php echo isset($form_error) ? set_value("host") : $item->host?>" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("host"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Port</label>
                        <input class="form-control" placeholder="Port" name="port"  value="<?php echo isset($form_error) ? set_value("port") : $item->port?>" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("port"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label><?php echo lang('password')?></label>
                        <input class="form-control" placeholder="Password" name="password" type="password"  value="<?php echo isset($form_error) ? set_value("password") : $item->password?>" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('mail-address')?></label>
                        <input name="user" class="form-control" placeholder="User"  type="email"  value="<?php echo isset($form_error) ? set_value("user") : $item->user?>"  >

                    </div>
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input name="user_name" class="form-control" placeholder="<?php echo lang('username')?>"  type="text"  value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name?>"  >

                    </div>
                    <div class="form-group">
                        <label>From</label>
                        <input name="from" class="form-control" placeholder="From"  type="email"  value="<?php echo isset($form_error) ? set_value("from") : $item->from?>" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("from"); ?></small>
                        <?php } ?>

                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input name="to" class="form-control" placeholder="To"  type="email"  value="<?php echo isset($form_error) ? set_value("to") :  $item->to?>" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("to"); ?></small>
                        <?php } ?>

                    </div>

                    <?php if(isDemo()){ ?>
<button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
<?php }?>
                    <a href="<?php echo base_url("Email_settings"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>