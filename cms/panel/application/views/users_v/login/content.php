
<form action="<?php echo base_url('Login/DoLogin')?>" method="post">

<div class="form">
    <div><img class="icon" src="<?php  echo base_url('assets/images/fke.ico')?>"></div>
    <h2><?php echo lang('login')?></h2>

    <div class="input">

        <div class="inputBox">
            <label><?php echo lang('mail-address')?></label>
            <input type="email" name="email" placeholder="example@xyz.com">
            <?php  if (isset($form_error)){?>
                <small class="pull-right input-form-error "><?php  echo form_error("email");?></small>
            <?php }?>
        </div>
        <div class="inputBox">
            <label><?php echo lang('password')?></label>
            <input type="password" name="password" placeholder=&#11044&#11044&#11044&#11044&#11044&#11044&#11044&#11044&#11044&#11044&#11044>
            <?php  if (isset($form_error)){?>
                <small class="pull-right input-form-error "><?php  echo form_error("password");?></small>
            <?php }?>

        </div>
        <div class="inputBox">
            <input type="submit" name="" value="<?php echo lang('sign-in')?>">
        </div>

        <p class="forget"><?php echo lang('forgot-password?')?> ? <a href="<?php  echo base_url("forget_password")?>"><?php echo lang('click-here')?></a></p>
    </div>

</div>

</form>

