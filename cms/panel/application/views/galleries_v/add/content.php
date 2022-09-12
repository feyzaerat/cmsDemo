<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-gallery')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Galleries/save"); ?>" method="post">
                    <div class="form-group">
                        <label><?php echo lang('gallery-title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('enter-title')?>" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6" ><?php echo lang('gallery-type')?> </label>
                        <div id="control-demo-6" >
                            <select class="form-control news_type_select" name="gallery_type" >
                                <option <?php echo (isset($galleryType) && $galleryType == "image") ? "selected" : "" ;?> value="image"><?php echo lang('image')?></option>
                                <option <?php echo (isset($galleryType) && $galleryType == "video") ? "selected" : "" ;?> value="video">Video</option>
                                <option <?php echo (isset($galleryType) && $galleryType == "file") ? "selected" : "" ;?> value="file"><?php echo lang('file')?></option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <a href="<?php echo base_url("Galleries"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>