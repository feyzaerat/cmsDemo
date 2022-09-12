<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title </b>". lang('is-updating') ; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("News/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('title')?>" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('description')?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="control-demo-6" class=""><?php echo lang('news-type')?></label>
                        <div id="control-demo-6" class="">
                            <?php if(isset($form_error)) { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($news_type == "image") ? "selected" : ""; ?> value="image"><?php echo lang('image')?></option>
                                    <option <?php echo ($news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } else { ?>
                                <select class="form-control news_type_select" name="news_type">
                                    <option <?php echo ($item->news_type == "image") ? "selected" : ""; ?> value="image"><?php echo lang('image')?></option>
                                    <option <?php echo ($item->news_type == "video") ? "selected" : ""; ?> value="video">Video</option>
                                </select>
                            <?php } ?>
                        </div>
                    </div><!-- .form-group -->

                    <?php if(isset($form_error)){ ?>

                        <div class="row">

                            <div class="col-md-1 col-sm-1 col-xs-1 image_upload_container">
                                <img width="80" src="<?php echo base_url("uploads/$vFolder/$item->img_url"); ?>" alt="" class="img-rounded">
                            </div>

                            <div class="col-md-11 col-sm-11 col-xs-11 form-group image_upload_container" style="display: <?php echo ($news_type == "image") ? "block" : "none"; ?>">
                                <label><?php echo lang('choose-a-photo')?></label>
                                <input type="file" name="img_url" class="form-control">
                            </div>


                        </div>

                        <div class="form-group video_url_container" style="display: <?php echo ($news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Ex : https://youtube.com/embed/ABCDEF123" name="video_url">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("video_url"); ?></small>
                            <?php } ?>
                        </div>


                    <?php } else { ?>

                        <div class="row">

                            <div class="col-md-1 col-sm-1 col-xs-1 image_upload_container">
                                <img width="80" src="<?php echo base_url("uploads/$vFolder/$item->img_url"); ?>" alt="" class="img-rounded">
                            </div>

                            <div class="col-md-11 col-sm-11 col-xs-11 form-group image_upload_container" style="display: <?php echo ($item->news_type == "image") ? "block" : "none"; ?>">
                                <label><?php echo lang('choose-a-photo')?></label>
                                <input type="file" name="img_url" class="form-control">
                            </div>


                        </div>


                        <div class="form-group video_url_container" style="display: <?php echo ($item->news_type == "video") ? "block" : "none"; ?>">
                            <label>Video URL</label>
                            <input class="form-control" placeholder="Ex : https://youtube.com/embed/ABCDEF123" name="video_url" value="<?php echo $item->video_url; ?>">
                        </div>


                    <?php } ?>

                    <?php if(isDemoUpdate()){ ?>
                   <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('update')?></button>
                    <?php }?>
                    <a href="<?php echo base_url("News"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>