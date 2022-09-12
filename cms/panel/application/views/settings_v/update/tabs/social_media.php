<div role="tabpanel" class="tab-pane fade" id="tab-6">
    <div class="row">
        <div class="form-group col-xl-8 col-l-8 col-md-8 col-sm-8 col-xs-8">
            <label><?php echo lang('mail-address')?></label>
            <input class="form-control" placeholder="<?php echo lang('mail-address')?>" name="email" value="<?php echo isset($form_error) ? set_value("email") : $item->email;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xl-4 col-l-4 col-md-4 col-sm-4 col-xs-4">
            <label>Facebook</label>
            <input class="form-control" placeholder="<?php echo lang('enter-Facebook')?> " name="facebook" value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("facebook"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group  col-xl-4 col-l-4 col-md-4 col-sm-4 col-xs-4">
            <label>Twitter</label>
            <input class="form-control" placeholder="<?php echo lang('enter-Twitter')?> " name="twitter" value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("twitter"); ?></small>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xl-4 col-l-4 col-md-4 col-sm-4 col-xs-4">
            <label>Instagram</label>
            <input class="form-control" placeholder="<?php echo lang('enter-instagram')?> " name="instagram" value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("instagram"); ?></small>
            <?php } ?>
        </div>
        <div class="form-group  col-xl-4 col-l-4 col-md-4 col-sm-4 col-xs-4">
            <label>Linked In</label>
            <input class="form-control" placeholder="<?php echo lang('enter-LinkedIn')?> " name="linkedin" value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("linkedin"); ?></small>
            <?php } ?>
        </div>
    </div>
</div><!-- .tab-pane  -->
