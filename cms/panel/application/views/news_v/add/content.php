<div class="row">
    <div class="col-md-12">

        <h4 class="m-b-lg">
            <?php echo lang('add-news')?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("News/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo lang('title')?></label>
                        <input class="form-control" placeholder="<?php echo lang('title')?>" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('description')?></label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="control-demo-6" ><?php echo lang('news-type')?></label>
                            <div id="control-demo-6" >
                                <select class="form-control news_type_select" name="news_type" >
                                    <option><?php echo lang('news-type')?></option>
                                    <option <?php echo (isset($newsType) && $newsType == "image") ? "selected" : "" ;?> value="image"><?php echo lang('image')?></option>
                                    <option <?php echo (isset($newsType) && $newsType == "video") ? "selected" : "" ;?> value="video">Video</option>
                                </select>
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("news-type"); ?></small>
                                <?php } ?>
                            </div>
                    </div>

                    <?php if(isset($form_error)){?>

                    <div class="form-group image_upload_container" style="display: <?php echo ($newsType == "image") ? "block" : "none" ;?>">
                      <label><?php echo lang('choose-a-photo')?></label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <br/>

                    <div class="form-group video_url_container"  style="display: <?php echo ($newsType == "video") ? "block" : "none" ;?>">
                        <label>Video URL</label>
                        <input  name="video_url" class="form-control" placeholder="Ex : https://youtube.com/embed/ABCDEF123">
                          <?php if(isset($form_error)){?>
                          <small class="pull-right input-form-error"><?php echo $form_error("video_url");?></small>
                          <?php }?>
                    </div>
                    <br/>

                    <?php } else {?>

                    <div class="form-group image_upload_container">
                        <label><?php echo lang('choose-a-photo')?></label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <br/>

                    <div class="form-group video_url_container">
                        <label>Video URL</label>
                        <input  name="video_url" class="form-control" placeholder=" Ex : https://youtube.com/embed/ABCDEF123">

                    </div>
                    <br/>
                    <?php }?>



                    <button type="submit" class="btn btn-primary btn-md btn-outline"><?php echo lang('save')?></button>
                    <a href="<?php echo base_url("News"); ?>" class="btn btn-md btn-danger btn-outline"><?php echo lang('cancel')?></a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>