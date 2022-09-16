<div role="tabpanel" class="tab-pane in active fade" id="tab-1">
    <div class="row">
        <div class="form-group col-xl-8 col-l-8 col-md-8 col-sm-12 col-xs-12" >
            <label><?php echo lang('company-name')?></label>
            <input class="form-control" placeholder="<?php echo lang('company-name-placeholder')?>" name="company_name" value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("company_name"); ?></small>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xl-4 col-l-4 col-md-4 col-sm-6 col-xs-6">
            <label><?php echo lang('phone')?> 1</label>
            <input class="form-control" placeholder="<?php echo lang('phone')?> " name="phone_1" value="<?php echo isset($form_error) ? set_value("phone_1") : $item->phone_1;?>">
            <?php if(isset($form_error)){ ?>
                <small class="pull-right input-form-error"> <?php echo form_error("phone_1"); ?></small>
            <?php } ?>
        </div>


        <div class="form-group col-xl-4 col-l-4 col-md-4 col-sm-6 col-xs-6">
            <label><?php echo lang('phone')?> 2</label>
            <input class="form-control" placeholder="<?php echo lang('optional')?>" name="phone_2" value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2;?>">

        </div>

    </div>
    <div class="row">
        <div class="form-group col-xl-4 col-l-4 col-md-6 col-sm-6 col-xs-6">
            <label><?php echo lang('mail-address')?> </label>
            <input type="email" class="form-control" placeholder="<?php echo lang('mail-address')?>" name="email" >
        </div>

        <div class="form-group col-xl-4 col-l-4 col-md-6 col-sm-4 col-xs-6">
            <label><?php echo lang('fax')?> </label>
            <input class="form-control" placeholder="<?php echo lang('fax')?>" name="fax" >
        </div>
    </div>
</div><!-- .tab-pane  -->
