
<form action="<?php echo base_url("reset_password")?>" method="post">



<div class="form">
    <div><img class="icon" src="<?php echo base_url('assets/images/fkeo-logo-light.png')?>"></div>
    <h2><?php echo lang('reset-password')?></h2>

    <div class="input">

        <div class="inputBox form-group">
            <label><?php echo lang('mail-address')?></label>
            <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="example@xyz.com"
                    value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
            <?php if (isset($form_error)){?>
                <small class="pull-right input-form-error "><?php echo form_error("email");?> </small>
            <?php }?>
        </div>

        <div class="inputBox">
            <input type="submit" name="" value="<?php echo lang('reset-password')?>">
        </div>


    </div>

</div>

</form>

