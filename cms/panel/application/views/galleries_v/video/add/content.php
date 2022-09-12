<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo lang('add-new-video')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("Galleries/GalleryVideoSave/$gallery_id"); ?>" method="post" >
                    <br/>
                    <div class="form-group " >
                        <label>Video URL</label>
                        <input  name="url" class="form-control" placeholder="Ex : https://youtube.com/embed/ABCDEF123">
                    </div>
                    <br/>

                    <?php if(isDemo()){ ?>
                   <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <?php }?>
                    <a href="<?php echo base_url("Galleries/gallery_video_list/$gallery_id"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>