<div role="tabpanel" class="tab-pane fade" id="tab-2">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label><?php echo lang('job')?></label>
                <input class="form-control" type="text" name="user_job" placeholder="<?php echo lang('job')?>">
            </div>
        </div>
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
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label><?php echo lang('id-no')?></label>
                <input class="form-control" type="text" name="user_job" placeholder="<?php echo lang('id-no')?>">
            </div>
        </div>
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
    </div>
    <div class="form-group image_upload_container">
        <label><?php echo lang('choose-a-photo')?></label>
        <input name="img_url" class="form-control"  type="file">
    </div>
</div>