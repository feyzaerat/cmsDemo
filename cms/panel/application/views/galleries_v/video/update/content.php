<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b> $item->url </b>". lang('is-updating'); ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Galleries/GalleryVideoUpdate/$item->id/$item->gallery_id"); ?>" method="post" >
                        <div class="form-group" >
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Ex : https://youtube.com/embed/ABCDEF123" name="url" value="<?php echo $item->url?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("url"); ?></small>
                            <?php } ?>
                        </div>

                    <?php if(isDemoUpdate()){ ?>
                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
                    <?php }?>
                    <a href="<?php echo base_url("Galleries/gallery_video_list/$item->gallery_id"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>