<div role="tabpanel" class="tab-pane fade" id="tab-7">
    <div class="row">
        <div class="col-xl-4 col-l-4 col-md-4 col-sm-4 col-xs-4 ">
            <img src="<?php echo base_url("uploads/{$vFolder}/$item->logo")?>"
                 alt="<?php echo $item->company_name?>"
                 class="img-responsive"
                 style="margin:0 auto;"
                 width="90">
        </div>
        <div class="col-xl-8 col-l-8 col-md-8 col-sm-8 col-xs-8 ">
        <div class="form-group image_upload_container">
            <label><?php echo lang('choose-a-photo')?></label>
            <input type="file" name="logo" class="form-control" placeholder="<?php echo lang('choose-a-photo')?>">
        </div>
        </div>
    </div>

</div><!-- .tab-pane  -->
